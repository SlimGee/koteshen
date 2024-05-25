import { Editor } from "@milkdown/core";
import { commonmark } from "@milkdown/preset-commonmark";
import { gfm } from "@milkdown/preset-gfm";
import { listener, listenerCtx } from "@milkdown/plugin-listener";
import { history } from "@milkdown/plugin-history";
import { math } from "@milkdown/plugin-math";
import { diagram } from "@milkdown/plugin-diagram";
import { prism, prismConfig } from "@milkdown/plugin-prism";
import { emoji } from "@milkdown/plugin-emoji";
import { cursor } from "@milkdown/plugin-cursor";
import { indent, indentConfig } from "@milkdown/plugin-indent";
import { trailing } from "@milkdown/plugin-trailing";
import { upload } from "@milkdown/plugin-upload";
import { clipboard } from "@milkdown/plugin-clipboard";
import { placeholder, placeholderCtx } from "../plugins/placeholder";
import { link } from "../plugins/link";
import { ImageTooltip, image } from "../plugins/image";

// Don't forget to import the css file.
import "@milkdown/theme-nord/style.css";
import "katex/dist/katex.min.css";
import "prism-themes/themes/prism-dracula.css";

import { registerLanguages } from "./utils/refractor";
import { Slash, slash } from "../plugins/slash";
import { Block, block } from "../plugins/block";
import { Tooltip, tooltip } from "../plugins/tooltip";
import { code } from "../plugins/code";

class Store {
    static Editor;
}

export const useInstance = () => Store.Editor;

export const setInstance = (editor) => {
    Store.Editor = editor;
};

export const destroyInstance = () => {
    useInstance().destroy(true);
    Store.Editor = null;
};

export const useEditor = () => {
    const editor = Editor.make()
        .use(commonmark)
        .use(gfm)
        .use(math)
        .use(history)
        .use(emoji)
        .use(diagram)
        .use(prism)
        .use(cursor)
        .use(link)
        .use(indent)
        .use(clipboard)
        .use(upload)
        .use(image)
        .use(trailing)
        .config((ctx) => {
            ctx.set(prismConfig.key, {
                configureRefractor: (refractor) => {
                    registerLanguages(refractor);
                },
            });

            ctx.set(indentConfig.key, {
                type: "space",
                size: 4,
            });

            ctx.set(block.key, {
                view: Block(ctx),
            });

            ctx.set(slash.key, {
                view: Slash,
            });

            ctx.set(image.key, {
                view: ImageTooltip,
            });

            ctx.set(tooltip.key, {
                view: Tooltip,
            });

            ctx.set(placeholderCtx, "Start writing something cool...");
        })
        .use(slash)
        .use(block)
        .use(tooltip)
        .use(placeholder)
        .use(code)
        .use(listener);

    setInstance(editor);

    return editor;
};
