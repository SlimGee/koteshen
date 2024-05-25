import { $view } from "@milkdown/utils";
import { codeBlockSchema } from "@milkdown/preset-commonmark";
import { CoreNodeView } from "@prosemirror-adapter/core";

export const code = [
    $view(
        codeBlockSchema.node,
        () => (node, view, getPos, decorations, innerDecorations) => {
            return new CoreNodeView({
                node,
                view,
                getPos,
                decorations,
                innerDecorations,
                options: {
                    as: "pre",
                },
            });
        },
    ),
];
