import { Controller } from "@hotwired/stimulus";
import * as FilePond from "filepond";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginImageExifOrientation from "filepond-plugin-image-exif-orientation";
import FilePondPluginImageValidateSize from "filepond-plugin-image-validate-size";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import axios from "axios";

import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

FilePond.registerPlugin(
    FilePondPluginFileValidateType,
    FilePondPluginImageExifOrientation,
    FilePondPluginImagePreview,
    FilePondPluginImageValidateSize,
);

export default class extends Controller {
    static targets = ["input", "template", "upload"];

    static values = {
        process: String,
        restore: String,
        revert: String,
        current: Array,
        label: String,
        field: {
            type: String,
            default: "image",
        },
    };
    connect() {
        const pond = FilePond.create(this.inputTarget, {
            labelIdle: this.labelValue,
            imagePreviewHeight: 100,
            imageCropAspectRatio: "1:1",
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: "compact square",
            styleLoadIndicatorPosition: "center bottom",
            styleProgressIndicatorPosition: "right bottom",
            styleButtonRemoveItemPosition: "left bottom",
            styleButtonProcessItemPosition: "right bottom",
            credits: false,
            allowPaste: false,
            name: "image",
        });

        let token = document.head.querySelector('meta[name="csrf-token"]');
        let submitter = document.querySelector('[type="submit"]');

        pond.setOptions({
            files: this.currentValue
                .filter((image) => {
                    if (typeof image === "string") {
                        return image.length > 1;
                    }
                    return true;
                })
                .map((image) => ({
                    source: typeof image === "string" ? image : image.file_url,

                    options: {
                        type: typeof image === "string" ? "limbo" : "local",
                    },
                })),

            server: {
                process: {
                    url: this.processValue,
                    headers: {
                        "X-CSRF-Token": token.content,
                    },
                },

                revert: (uniqueFileId, load, error) => {
                    axios
                        .delete(`${this.revertValue}?media=${uniqueFileId}`)
                        .then((response) => {
                            this.uploadTargets.forEach((el) => {
                                if (el.value === uniqueFileId) {
                                    el.remove();
                                }
                            });

                            load();
                        })
                        .catch((err) => {
                            error({
                                type: "error",
                                body: err.message,
                                code: err.response?.status,
                            });
                        });
                },

                restore: (
                    uniqueFileId,
                    load,
                    error,
                    progress,
                    abort,
                    headers,
                ) => {
                    console.log(uniqueFileId);
                    axios
                        .get(`${this.restoreValue}?path=${uniqueFileId}`, {
                            onDownloadProgress: (event) => {
                                progress(true, event.loaded, event.total);
                            },
                            responseType: "blob",
                        })
                        .then((response) => {
                            headers(response.request.getAllResponseHeaders());

                            load(response.data);
                        })
                        .catch((err) => error(err.message));

                    // Should expose an abort method so the request can be cancelled
                    return {
                        abort: () => {
                            // User tapped abort, cancel our ongoing actions here

                            // Let FilePond know the request has been cancelled
                            abort();
                        },
                    };
                },

                remove: (source, load, error) => {
                    axios
                        .delete(`${this.revertValue}?media=${source}`)
                        .then((response) => {
                            load();
                        })
                        .catch((err) => {
                            error({
                                type: "error",
                                body: err.message,
                                code: err.response?.status,
                            });
                        });
                },

                load: (source, load, error, progress, abort, headers) => {
                    axios
                        .get(source, {
                            onDownloadProgress: (event) => {
                                progress(true, event.loaded, event.total);
                            },
                            responseType: "blob",
                        })
                        .then((response) => {
                            headers(response.request.getAllResponseHeaders());

                            load(response.data);
                        })
                        .catch((err) => {
                            if (err.response) {
                                return error({
                                    type: "error",
                                    body: err.response.statusText,
                                    code: err.response.status,
                                });
                            }

                            return error({
                                type: "error",
                                body: err.message,
                                code: 400,
                            });
                        });

                    return {
                        abort: () => {
                            // User tapped cancel, abort our ongoing actions here

                            // Let FilePond know the request has been cancelled
                            abort();
                        },
                    };
                },
            },
        });

        pond.on("processfile", (error, event) => {
            console.log(this.fieldValue);
            const template = this.templateTarget.innerHTML
                .replace("NAME", this.fieldValue)
                .replace("VALUE", event.serverId);

            this.element.insertAdjacentHTML("beforeend", template);
            submitter.removeAttribute("disabled");
        });

        pond.on("processfilestart", () => {
            submitter.setAttribute("disabled", true);
        });

        pond.on("addfilestart", () => {
            submitter.setAttribute("disabled", true);
        });

        pond.on("addfile", () => {
            submitter.removeAttribute("disabled");
        });

        pond.on("processfilerevert", () => {
            submitter.removeAttribute("disabled");
        });

        pond.on("processfileabort", () => {
            submitter.removeAttribute("disabled");
        });
    }
}
