import { createSlice, createTimer } from "@milkdown/ctx";
import { InitReady, prosePluginsCtx } from "@milkdown/core";
import { Plugin, PluginKey } from "@milkdown/prose/state";
import { Decoration, DecorationSet } from "@milkdown/prose/view";

export const placeholderCtx = createSlice(
    "Start writing something great...",
    "placeholder",
);
export const placeholderTimerCtx = createSlice([], "editorStateTimer");

export const PlaceholderReady = createTimer("PlaceholderReady");

const key = new PluginKey("MILKDOWN_PLACEHOLDER");

export const placeholder = (ctx) => {
    ctx.inject(placeholderCtx)
        .inject(placeholderTimerCtx, [InitReady])
        .record(PlaceholderReady);

    return async () => {
        await ctx.waitTimers(placeholderTimerCtx);

        const prosePlugins = ctx.get(prosePluginsCtx);

        const update = (view) => {
            const placeholder = ctx.get(placeholderCtx);
            const doc = view.state.doc;
            console.log(doc.firstChild?.content.size);
            if (
                view.editable &&
                doc.childCount === 1 &&
                doc.firstChild?.isTextblock &&
                doc.firstChild?.content.size === 0 &&
                doc.firstChild?.type.name === "paragraph"
            ) {
                console.log("shshs");
                view.dom.setAttribute("data-placeholder", placeholder);
            } else {
                view.dom.removeAttribute("data-placeholder");
            }
        };

        const plugins = [
            ...prosePlugins,
            new Plugin({
                key,
                props: {
                    decorations(state) {
                        const placeholder = ctx.get(placeholderCtx);
                        const doc = state.doc;
                        if (
                            doc.childCount === 1 &&
                            doc.firstChild?.isTextblock &&
                            doc.firstChild?.content.size === 0
                        ) {
                            return DecorationSet.create(doc, [
                                Decoration.widget(1, (view) => {
                                    if (view.editable) {
                                        const span =
                                            document.createElement("span");
                                        span.classList.add("text-slate-500");
                                        span.setAttribute(
                                            "contenteditable",
                                            true,
                                        );
                                        span.textContent = placeholder;
                                        span.focus({
                                            preventScroll: true,
                                        });
                                        return span;
                                    }
                                }),
                            ]);
                        }

                        return this.getState(state);
                    },
                },
                view(view) {
                    update(view);

                    return { update };
                },
            }),
        ];

        ctx.set(prosePluginsCtx, plugins);

        ctx.done(PlaceholderReady);
    };
};
