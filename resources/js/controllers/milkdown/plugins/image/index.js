import { TooltipProvider, tooltipFactory } from "@milkdown/plugin-tooltip";
import { NodeSelection } from "@milkdown/prose/state";
import { commandsCtx } from "@milkdown/core";
import { application } from "../../../../libs/stimulus";
import { updateImageCommand } from "@milkdown/preset-commonmark";
import { useInstance as useEditorInstance } from "../../editor";
import { Controller } from "@hotwired/stimulus";
import { useDebounce } from "stimulus-use";

export const ImageTooltip = (view) => {
    application.register(
        "image-tooltip",
        class extends Controller {
            static debounces = ["update"];

            static values = {
                attrs: {
                    type: Object,
                    default: {
                        alt: "",
                        src: "",
                        title: "",
                    },
                },
            };

            original;
            connect() {
                useDebounce(this);
                this.original = {
                    ...this.attrsValue,
                };
            }
            update({ target, params: { key } }) {
                this.attrsValue = {
                    ...this.attrsValue,
                    [key]: target.value,
                };
            }

            hidden() {
                for (const attrsValueKey in this.original) {
                    if (
                        this.attrsValue[attrsValueKey]?.trim() ===
                        this.original[attrsValueKey]?.trim()
                    ) {
                        delete this.attrsValue[attrsValueKey];
                    }
                }

                useEditorInstance().action((ctx) => {
                    ctx.get(commandsCtx).call(
                        updateImageCommand.key,
                        this.attrsValue,
                    );
                });
            }
        },
    );

    const content = document.createElement("div");
    const provider = new TooltipProvider({
        content,
        tippyOptions: {
            zIndex: 1000,
            onHide() {
                provider.element.firstChild.dispatchEvent(
                    new CustomEvent("hide"),
                );
            },
        },
        shouldShow: (currentView) => {
            const { selection } = currentView.state;
            const { empty, from } = selection;

            const isTooltipChildren = provider.element.contains(
                document.activeElement,
            );

            const notHasFocus = !view.hasFocus() && !isTooltipChildren;

            const isReadonly = !view.editable;

            if (notHasFocus || empty || isReadonly) {
                return false;
            }

            return (
                selection instanceof NodeSelection &&
                view.state.doc.nodeAt(from)?.type.name === "image"
            );
        },
    });

    return {
        update: (updatedView, prevState) => {
            const { state } = updatedView;
            const attrs = state.doc.nodeAt(state.selection.from)?.attrs ?? {};
            const { src, alt, title } = attrs;

            content.innerHTML = `
                <div
                data-controller='image-tooltip' data-action='hide->image-tooltip#hidden' data-image-tooltip-attrs-value='${JSON.stringify(
                    attrs,
                )}'
                class="flex w-96 flex-col gap-2 rounded bg-white dark:bg-slate-900 p-4 shadow dark:shadow-slate-900 border dark:border-slate-700"
              >
                <label class="flex flex-row items-center justify-center gap-4">
                  <span class="w-10 dark:text-slate-400">Link</span>
                  <input
                    type="text"
                    class="mt-1 block w-full rounded dark:border-slate-700 bg-slate-300 dark:bg-slate-900 shadow-sm focus:border-indigo-300
                    focus:ring focus:ring-indigo-nord-10 dark:bg-nord0 dark:border-nord3"
                    data-image-tooltip-key-param='src'
                    data-action='blur->image-tooltip#update image-tooltip#update'
                    value="${src}"
                  />
                </label>
                <label class="flex flex-row items-center justify-center gap-4">
                  <span class="w-10 dark:text-slate-400">Alt</span>
                  <input
                    type="text"
                    class="mt-1 block w-full rounded dark:border-slate-700 bg-slate-300 dark:bg-slate-900 shadow-sm focus:border-indigo-300
                    focus:ring focus:ring-indigo-nord-10 dark:bg-nord0 dark:border-nord3"
                    data-image-tooltip-key-param='alt'
                    data-action='blur->image-tooltip#update image-tooltip#update'
                    value='${alt}'
                  />
                </label>
                <label class="flex flex-row items-center justify-center gap-4">
                  <span class="w-10 dark:text-slate-400">Title</span>
                  <input
                    type="text"
                    class="mt-1 block w-full rounded dark:border-slate-700 bg-slate-300 dark:bg-slate-900 shadow-sm focus:border-indigo-300
                    focus:ring focus:ring-indigo-nord-10 dark:bg-nord0 dark:border-nord3"
                    data-image-tooltip-key-param='title'
                    data-action='blur->image-tooltip#update image-tooltip#update'
                    value='${title}'
                  />
                </label>
              </div>
            `.trim();

            provider.element = content;

            provider.update(updatedView, prevState);
        },
        destroy: () => {
            content.remove();

            provider.destroy();
        },
    };
};

export const image = tooltipFactory("image-tooltip");
