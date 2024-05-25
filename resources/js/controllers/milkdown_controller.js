import { Controller } from "@hotwired/stimulus";
import { rootCtx, defaultValueCtx } from "@milkdown/core";
import { listenerCtx } from "@milkdown/plugin-listener";
import { destroyInstance, useEditor, useInstance } from "./milkdown/editor";
import { registerEditorControllers } from "./milkdown/controllers";

// Connects to data-controller="milkdown"
export default class extends Controller {
    static afterLoad(identifier, application) {
        registerEditorControllers();
    }

    connect() {
        const uniqueElementId = `milkdown-${Date.now()}`;

        const markup = `
            <div class="h-full relative border rounded dark:border-slate-700" data-turbo-temporary="true">
                <div data-controller="milkdown-toolbar" class="absolute top-0 left-0 w-full h-10 border-b border-nord4 dark:border-slate-600 dark:divide-slate-600">
                    <template data-milkdown-toolbar-target="template">
                        <div data-action="click->milkdown-toolbar#command" data-milkdown-toolbar-index-param="INDEX" class="flex justify-center items-center w-10 h-10 cursor-pointer text-slate-600 fill-slate-600 dark:text-slate-200 dark:hover:bg-slate-700 dark:fill-slate-200 dark:hover:fill-slate-50 dark:hover:text-slate-50 hover:bg-slate-300 hover:text-slate-900 hover:fill-slate-900">
                            <span class="material-symbols-outlined !text-base">ICON</span>
                        </div>
                    </template>

                    <div class="flex mr-auto prose justify-start" data-milkdown-toolbar-target="container">
                    </div>
                </div>
                <div id="${uniqueElementId}" class="py-10 max-w-full prose prose-slate md:prose-lg xl:prose-xl dark:prose-invert"></div>
            </div>
        `;
        this.element.parentElement.insertAdjacentHTML("beforeend", markup);
        this.element.classList.add("hidden");

        useEditor()
            .config((ctx) => {
                ctx.set(rootCtx, document.getElementById(uniqueElementId));
                ctx.set(defaultValueCtx, this.element.value);

                ctx.get(listenerCtx).markdownUpdated(
                    (ctx, markdown, prevMarkdown) => {
                        this.element.value = markdown;
                    },
                );
            })
            .create()
            .then(() => {
                console.log("edit redo");
            });
    }

    disconnect() {
        destroyInstance();
    }
}
