import { fadeIn, getElementFromString, wrap, unwrap } from "./utils";

export class Dropify {
    element;
    settings = {
        defaultFile: "",
        maxFileSize: 0,
        minWidth: 0,
        maxWidth: 0,
        minHeight: 0,
        maxHeight: 0,
        showRemove: true,
        showLoader: true,
        showErrors: true,
        errorTimeout: 3000,
        errorsPosition: "overlay",
        imgFileExtensions: ["png", "jpg", "jpeg", "gif", "bmp"],
        maxFileSizePreview: "5M",
        allowedFormats: ["portrait", "square", "landscape"],
        allowedFileExtensions: ["*"],
        messages: {
            default: "Drag and drop a file here or click",
            replace: "Drag and drop or click to replace",
            remove: "Remove",
            error: "Ooops, something wrong happended.",
        },
        error: {
            fileSize: "The file size is too big ({{ value }} max).",
            minWidth: "The image width is too small ({{ value }}}px min).",
            maxWidth: "The image width is too big ({{ value }}}px max).",
            minHeight: "The image height is too small ({{ value }}}px min).",
            maxHeight: "The image height is too big ({{ value }}px max).",
            imageFormat: "The image format is not allowed ({{ value }} only).",
            fileExtension: "The file is not allowed ({{ value }} only).",
        },
        tpl: {
            wrap: '<div class="dropify-wrapper"></div>',
            loader: '<div class="dropify-loader"></div>',
            message:
                '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview:
                '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename:
                '<p class="dropify-filename"><span class="dropify-filename-inner"></span></p>',
            clearButton:
                '<button type="button" class="dropify-clear">{{ remove }}</button>',
            errorLine: '<p class="dropify-error">{{ error }}</p>',
            errorsContainer:
                '<div class="dropify-errors-container"><ul></ul></div>',
        },
    };

    wrapper = null;

    preview = null;

    filenameWrapper = null;

    errorsEvent = null;

    isDisabled = false;

    isInit = false;

    errorsEvent = {
        errors: [],
        addError: function (key, value) {
            this.errors.push({ key: key, value: value });
        },
    };

    file = {
        object: null,
        name: null,
        size: null,
        width: null,
        height: null,
        type: null,
    };

    constructor(element, options = {}) {
        if (
            !(
                window.File &&
                window.FileReader &&
                window.FileList &&
                window.Blob
            )
        ) {
            return;
        }

        this.element = element;
        this.settings = Object.assign(this.settings, options);

        if (!Array.isArray(this.settings.allowedFormats)) {
            this.settings.allowedFormats =
                this.settings.allowedFormats.split(" ");
        }

        if (!Array.isArray(this.settings.allowedFileExtensions)) {
            this.settings.allowedFileExtensions =
                this.settings.allowedFileExtensions.split(" ");
        }

        this.translateMessages();
        this.createElements();
        this.setContainerSize();

        this.errorsEvent.errors = [];

        this.onChange = this.onChange.bind(this);
        this.clearElement = this.clearElement.bind(this);
        this.onFileReady = this.onFileReady.bind(this);

        this.element.addEventListener("change", this.onChange);
        this.init();
    }

    onChange(event) {
        this.resetPreview(event.target);
        this.readFile(event.target);
    }

    createElements() {
        this.isInit = true;
        wrap(this.element, getElementFromString(this.settings.tpl.wrap));

        this.wrapper = this.element.parentNode;

        const messageWrapper = getElementFromString(this.settings.tpl.message);
        this.wrapper.insertBefore(messageWrapper, this.element);

        messageWrapper.appendChild(
            getElementFromString(this.settings.tpl.errorLine),
        );

        if (this.isTouchDevice() === true) {
            this.wrapper.classList.add("touch-fallback");
        }

        if (this.element.disabled) {
            this.isDisabled = true;
            this.wrapper.classList.add("disabled");
        }

        if (this.settings.showLoader === true) {
            this.loader = getElementFromString(this.settings.tpl.loader);
            this.element.parentNode.insertBefore(this.loader, this.element);
        }

        this.preview = getElementFromString(this.settings.tpl.preview);
        this.element.after(this.preview);

        if (this.isDisabled && this.settings.showRemove) {
            this.clearButton = getElementFromString(
                this.settings.tpl.clearButton,
            );
            this.element.after(this.clearButton);
            this.clearButton.addEventListener("click", this.clearElement);
        }

        this.filenameWrapper = getElementFromString(this.settings.tpl.filename);
        this.preview
            .querySelector(".dropify-infos-inner")
            .append(this.filenameWrapper);

        if (this.settings.showErrors) {
            this.errorsContainer = getElementFromString(
                this.settings.tpl.errorsContainer,
            );

            if (this.settings.errorsPosition === "outside") {
                this.wrapper.after(this.errorsContainer);
            } else {
                this.element.parentNode.insertBefore(
                    this.errorsContainer,
                    this.element,
                );
            }
        }

        var defaultFile = this.settings.defaultFile || "";

        if (defaultFile.trim() !== "") {
            this.file.name = this.cleanFilename(defaultFile);
            this.setPreview(this.isImage(), defaultFile);
        }
    }

    readFile(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            const image = new Image();
            const file = input.files[0];
            let srcBase64 = null;
            const _this = this;
            const eventFileReady = "dropify.fileReady";

            this.clearErrors();
            this.showLoader();
            this.setFileInformations(file);
            this.errorsEvent.errors = [];
            this.checkFileSize();
            this.isFileExtensionAllowed();

            if (
                this.isImage() &&
                this.file.size <
                    this.sizeToByte(this.settings.maxFileSizePreview)
            ) {
                this.element.addEventListener(
                    "dropify.fileReady",
                    this.onFileReady,
                );
                reader.readAsDataURL(file);
                reader.onload = (_file) => {
                    srcBase64 = _file.target.result;
                    image.src = _file.target.result;
                    image.onload = function () {
                        _this.setFileDimensions(this.width, this.height);
                        _this.validateImage();
                        _this.element.dispatchEvent(
                            new CustomEvent(eventFileReady, {
                                detail: { previewable: true, src: srcBase64 },
                            }),
                        );
                    };
                };
            } else {
                this.onFileReady();
            }
        }
    }

    onFileReady(
        { detail: { previewable, src } } = {
            detail: { previewable: false, src: null },
        },
    ) {
        this.element.removeEventListener("dropify.fileReady", this.onFileReady);

        if (this.errorsEvent.errors.length === 0) {
            this.setPreview(previewable, src);
        } else {
            this.element.dispatchEvent(
                new CustomEvent("dropify.errors", {
                    detail: { errors: this.errorsEvent.errors },
                }),
            );

            for (var i = this.errorsEvent.errors.length - 1; i >= 0; i--) {
                var errorNamespace = this.errorsEvent.errors[i].namespace;
                var errorKey = errorNamespace.split(".").pop();
                this.showError(errorKey);
            }

            if (typeof this.errorsContainer !== "undefined") {
                this.errorsContainer.classList.add("visible");

                var errorsContainer = this.errorsContainer;
                setTimeout(function () {
                    errorsContainer.classList.remove("visible");
                }, this.settings.errorTimeout);
            }

            this.wrapper.classList.add("has-error");
            this.resetPreview();
            this.clearElement();
        }
    }

    setFileInformations(file) {
        this.file.object = file;
        this.file.name = file.name;
        this.file.size = file.size;
        this.file.type = file.type;
        this.file.width = null;
        this.file.height = null;
    }

    setFileDimensions(width, height) {
        this.file.width = width;
        this.file.height = height;
    }

    setPreview(previewable, src) {
        this.wrapper.classList.remove("has-error");
        this.wrapper.classList.add("has-preview");
        this.filenameWrapper.querySelector(
            ".dropify-filename-inner",
        ).innerHTML = this.file.name;

        const render = this.preview.querySelector(".dropify-render");

        this.hideLoader();

        if (previewable === true) {
            const imgTag = document.createElement("img");
            imgTag.setAttribute("src", src);

            if (this.settings.height) {
                imgTag.style.maxHeight = this.settings.height;
            }

            render.appendChild(imgTag);
        } else {
            const el = document.createElement("i");
            el.classList.add("dropify-font-file");
            render.appendChild(el);

            const span = document.createElement("span");
            span.classList.add("dropify-extension");
            span.innerHTML = this.getFileType();
            render.appendChild(span);
        }
        fadeIn(this.preview);
    }

    resetPreview() {
        this.wrapper.classList.remove("has-preview");
        const render = this.preview.querySelector(".dropify-render");

        render.querySelector("i")?.remove();
        render.querySelector("img")?.remove();

        this.preview.style.display = "none";

        this.hideLoader();
    }

    cleanFilename(src) {
        let filename = src.split("\\").pop();
        if (filename == src) {
            filename = src.split("/").pop();
        }

        return src !== "" ? filename : "";
    }

    clearElement() {
        if (this.errorsEvent.errors.length === 0) {
            const eventBefore = "dropify.beforeClear";

            this.element.dispatchEvent(
                new CustomEvent(eventBefore, {
                    detail: { element: this.element },
                }),
            );

            this.resetFile();
            this.element.value = "";
            this.resetPreview();

            this.element.dispatchEvent(
                new CustomEvent("dropify.afterClear", {
                    detail: { element: this.element },
                }),
            );
        } else {
            this.resetFile();
            this.input.value = "";

            this.resetPreview();
        }
    }

    resetFile() {
        this.file.object = null;
        this.file.name = null;
        this.file.size = null;
        this.file.type = null;
        this.file.width = null;
        this.file.height = null;
    }

    setContainerSize() {
        if (this.settings.height) {
            this.wrapper.style.height = this.settings.height;
        }
    }

    isTouchDevice() {
        return (
            "ontouchstart" in window ||
            navigator.MaxTouchPoints > 0 ||
            navigator.msMaxTouchPoints > 0
        );
    }

    getFileType() {
        return this.file.name.split(".").pop().toLowerCase();
    }

    isImage() {
        if (
            this.settings.imgFileExtensions.indexOf(this.getFileType()) != "-1"
        ) {
            return true;
        }

        return false;
    }

    isFileExtensionAllowed() {
        if (
            this.settings.allowedFileExtensions.indexOf("*") != "-1" ||
            this.settings.allowedFileExtensions.indexOf(this.getFileType()) !=
                "-1"
        ) {
            return true;
        }
        this.pushError("fileExtension");

        return false;
    }

    translateMessages() {
        for (var name in this.settings.tpl) {
            for (var key in this.settings.messages) {
                this.settings.tpl[name] = this.settings.tpl[name].replace(
                    "{{ " + key + " }}",
                    this.settings.messages[key],
                );
            }
        }
    }

    checkFileSize() {
        if (
            this.sizeToByte(this.settings.maxFileSize) !== 0 &&
            this.file.size > this.sizeToByte(this.settings.maxFileSize)
        ) {
            this.pushError("fileSize");
        }
    }

    sizeToByte(size) {
        var value = 0;

        if (size !== 0) {
            var unit = size.slice(-1).toUpperCase(),
                kb = 1024,
                mb = kb * 1024,
                gb = mb * 1024;

            if (unit === "K") {
                value = parseFloat(size) * kb;
            } else if (unit === "M") {
                value = parseFloat(size) * mb;
            } else if (unit === "G") {
                value = parseFloat(size) * gb;
            }
        }

        return value;
    }

    validateImage() {
        if (
            this.settings.minWidth !== 0 &&
            this.settings.minWidth >= this.file.width
        ) {
            this.pushError("minWidth");
        }

        if (
            this.settings.maxWidth !== 0 &&
            this.settings.maxWidth <= this.file.width
        ) {
            this.pushError("maxWidth");
        }

        if (
            this.settings.minHeight !== 0 &&
            this.settings.minHeight >= this.file.height
        ) {
            this.pushError("minHeight");
        }

        if (
            this.settings.maxHeight !== 0 &&
            this.settings.maxHeight <= this.file.height
        ) {
            this.pushError("maxHeight");
        }

        if (
            this.settings.allowedFormats.indexOf(this.getImageFormat()) == "-1"
        ) {
            this.pushError("imageFormat");
        }
    }

    getImageFormat() {
        if (this.file.width == this.file.height) {
            return "square";
        }

        if (this.file.width < this.file.height) {
            return "portrait";
        }

        if (this.file.width > this.file.height) {
            return "landscape";
        }
    }

    pushError(errorKey) {
        var e = "dropify.error";
        this.errorsEvent.errors.push(e);
        this.element.dispatchEvent(
            new CustomEvent(e, {
                detail: { element: this.element, errorKey: errorKey },
            }),
        );
    }

    clearErrors() {
        if (typeof this.errorsContainer !== "undefined") {
            this.errorsContainer.querySelector("ul").innerHTML = "";
        }
    }

    showError(errorKey) {
        if (typeof this.errorsContainer !== "undefined") {
            this.errorsContainer
                .querySelector("ul")
                .append(
                    getElementFromString(
                        "<li>" + this.getError(errorKey) + "</li>",
                    ),
                );
        }
    }

    getError(errorKey) {
        var error = this.settings.error[errorKey],
            value = "";

        if (errorKey === "fileSize") {
            value = this.settings.maxFileSize;
        } else if (errorKey === "minWidth") {
            value = this.settings.minWidth;
        } else if (errorKey === "maxWidth") {
            value = this.settings.maxWidth;
        } else if (errorKey === "minHeight") {
            value = this.settings.minHeight;
        } else if (errorKey === "maxHeight") {
            value = this.settings.maxHeight;
        } else if (errorKey === "imageFormat") {
            value = this.settings.allowedFormats.join(", ");
        } else if (errorKey === "fileExtension") {
            value = this.settings.allowedFileExtensions.join(", ");
        }

        if (value !== "") {
            return error.replace("{{ value }}", value);
        }

        return error;
    }

    showLoader() {
        if (typeof this.loader !== "undefined") {
            this.loader.style.display = "block";
        }
    }

    hideLoader() {
        if (typeof this.loader !== "undefined") {
            this.loader.style.display = "none";
        }
    }

    destroy() {
        Array.from(this.element.parentNode.children).forEach((element) => {
            element.remove();
        });
        console.log(this.element.parentNode);
        if (this.element.parentNode) {
            unwrap(this.element);
        }
        this.isInit = false;
    }

    init() {
        if (this.isDropified()) {
            return;
        }

        this.createElements();
    }

    isDropified() {
        return this.isInit;
    }
}
