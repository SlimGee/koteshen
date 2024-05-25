import { Controller } from "@hotwired/stimulus";
import { commandsCtx, editorViewCtx } from "@milkdown/core";
import {
    toggleStrongCommand,
    toggleInlineCodeCommand,
    toggleLinkCommand,
    toggleEmphasisCommand,
    wrapInBlockquoteCommand,
} from "@milkdown/preset-commonmark";
import { toggleStrikethroughCommand } from "@milkdown/preset-gfm";
import { useInstance } from "../editor";

const tools = [
    {
        icon: "format_bold",
        action: (ctx) => {
            ctx.get(commandsCtx).call(toggleStrongCommand.key);
        },
    },
    {
        icon: "format_italic",
        action: (ctx) => {
            ctx.get(commandsCtx).call(toggleEmphasisCommand.key);
        },
    },
    {
        icon: "format_strikethrough",
        action: (ctx) => {
            ctx.get(commandsCtx).call(toggleStrikethroughCommand.key);
        },
    },
    {
        icon: "format_quote",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInBlockquoteCommand.key);
        },
    },
    {
        icon: "code",
        action: (ctx) => {
            ctx.get(commandsCtx).call(toggleInlineCodeCommand.key);
        },
    },
    {
        icon: "link",
        action: (ctx) => {
            ctx.get(commandsCtx).call(toggleLinkCommand.key);
        },
    },
];

export default class extends Controller {
    static targets = ["template", "container", "item"];

    connect() {
        tools.forEach((tool, index) => {
            const markup = this.templateTarget.innerHTML
                .replace("ICON", tool.icon)
                .replace("INDEX", index);

            this.containerTarget.insertAdjacentHTML("beforeend", markup);
        });
    }

    command({ params: { index } }) {
        useInstance().action((ctx) => {
            const view = ctx.get(editorViewCtx);
            tools[index].action(ctx);
            view.focus();
        });
    }

    disconnect() {
        this.containerTarget.innerHTML = "";
    }
}
