import { Controller } from "@hotwired/stimulus";
import { commandsCtx, editorViewCtx } from "@milkdown/core";
import { undoCommand, redoCommand } from "@milkdown/plugin-history";
import { useInstance } from "../editor";
import {
    toggleStrongCommand,
    toggleEmphasisCommand,
    wrapInBlockquoteCommand,
    wrapInBulletListCommand,
    wrapInOrderedListCommand,
} from "@milkdown/preset-commonmark";

import {
    toggleStrikethroughCommand,
    insertTableCommand,
} from "@milkdown/preset-gfm";

const tools = [
    {
        icon: "undo",
        action: (ctx) => {
            ctx.get(commandsCtx).call(undoCommand.key);
        },
    },
    {
        icon: "redo",
        action: (ctx) => {
            ctx.get(commandsCtx).call(redoCommand.key);
        },
    },
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
        icon: "format_quote",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInBlockquoteCommand.key);
        },
    },
    {
        icon: "format_strikethrough",
        action: (ctx) => {
            ctx.get(commandsCtx).call(toggleStrikethroughCommand.key);
        },
    },
    {
        icon: "table",
        action: (ctx) => {
            ctx.get(commandsCtx).call(insertTableCommand.key);
        },
    },
    {
        icon: "format_list_bulleted",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInBulletListCommand.key);
        },
    },
    {
        icon: "format_list_numbered",
        action: (ctx) => {
            ctx.get(commandsCtx).call(wrapInOrderedListCommand.key);
        },
    },
];

export default class extends Controller {
    static targets = ["template", "container"];

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
}
