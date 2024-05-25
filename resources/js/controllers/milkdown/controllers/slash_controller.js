import { Controller } from "@hotwired/stimulus";
import {
    wrapInHeadingCommand,
    createCodeBlockCommand,
    insertImageCommand,
} from "@milkdown/preset-commonmark";
import { commandsCtx, editorViewCtx } from "@milkdown/core";
import { useInstance } from "../editor";

const items = [
    {
        icon: "looks_one",
        name: "Large Heading",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInHeadingCommand.key);
        },
    },
    {
        icon: "looks_two",
        name: "Medium Heading",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInHeadingCommand.key, 2);
        },
    },
    {
        icon: "looks_3",
        name: "Small Heading",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInHeadingCommand.key, 3);
        },
    },
    {
        icon: "code",
        name: "Code Block",
        action: (ctx) => {
            ctx.get(commandsCtx).call(createCodeBlockCommand.key);
        },
    },
    {
        icon: "image",
        name: "Image",
        action: (ctx) => {
            ctx.get(commandsCtx).call(insertImageCommand.key, {
                src: "https://placehold.co/600x400",
                alt: "placeholder",
                title: "placeholder",
            });
        },
    },
];

export default class extends Controller {
    static targets = ["template", "container", "item"];
    static values = {
        selected: Number,
    };

    connect() {
        items.forEach((item, index) => {
            const template = this.templateTarget.innerHTML
                .replace("ICON", item.icon)
                .replace("INDEX", index)
                .replace("NAME", item.name);
            this.containerTarget.insertAdjacentHTML("beforeend", template);
        });

        this.highlightSelected();
    }

    command({ params: { index }, detail }) {
        useInstance().action((ctx) => {
            const view = ctx.get(editorViewCtx);
            view.dispatch(
                view.state.tr.deleteRange(
                    view.state.selection.from - 1,
                    view.state.selection.from,
                ),
            );

            if (detail.clearTwice) {
                view.dispatch(
                    view.state.tr.deleteRange(
                        view.state.selection.from - 1,
                        view.state.selection.from,
                    ),
                );
            }

            items[index].action(ctx);

            view.focus();
        });
    }

    disconnect() {
        this.containerTarget.innerHTML = "";
    }

    onKeydown(e) {
        const key = e.key;

        if (key === "ArrowDown") {
            e.preventDefault();
            e.stopPropagation();
            this.selectedValue =
                (this.selectedValue + 1) % this.itemTargets.length;
            this.highlightSelected();
        }

        if (key === "ArrowUp") {
            e.stopPropagation();
            e.preventDefault();

            this.selectedValue =
                (this.selectedValue - 1 + this.itemTargets.length) %
                this.itemTargets.length;
            this.highlightSelected();
        }

        if (key === "Enter") {
            e.preventDefault();
            e.stopPropagation();

            this.itemTargets[this.selectedValue].dispatchEvent(
                new CustomEvent("selected", {
                    detail: {
                        index: this.selectedValue,
                        clearTwice: true,
                    },
                }),
            );
        }
    }

    onMouseMove(e) {
        const target = e.target.closest("[data-milkdown-slash-target='item']");

        if (target) {
            this.selectedValue = this.itemTargets.indexOf(target);

            this.highlightSelected();
        }
    }

    highlightSelected() {
        this.itemTargets.forEach((el, index) => {
            if (
                el.classList.contains("bg-slate-200") ||
                el.classList.contains("dark:bg-slate-700")
            ) {
                el.classList.remove("bg-slate-200", "dark:bg-slate-700");
            }

            if (index === this.selectedValue) {
                el.classList.add("bg-slate-200", "dark:bg-slate-700");
            }
        });
    }
}
