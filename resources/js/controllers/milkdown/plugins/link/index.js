import { Plugin } from "@milkdown/prose/state";
import { Decoration, DecorationSet } from "@milkdown/prose/view";
import { $prose } from "@milkdown/utils";
import { backspace } from "./utils";

const createElement = (htmlString) => {
    const el = document.createElement("div");

    el.innerHTML = htmlString.trim();

    return el.children[0];
};

let focused = false;

const linkPlugin = () => {
    return $prose(
        () =>
            new Plugin({
                state: {
                    init() {
                        return DecorationSet.empty;
                    },

                    apply(tr) {
                        const { selection } = tr;

                        const { $from, $to } = selection;
                        const node = tr.doc.nodeAt(selection.from);

                        const mark = node?.marks.find(
                            (mark) => mark.type.name === "link",
                        );

                        if (!mark) return DecorationSet.empty;

                        let markPos = { start: -1, end: -1 };

                        tr.doc.nodesBetween(
                            $from.start(),
                            $to.end(),
                            (n, pos) => {
                                if (node === n) {
                                    markPos = {
                                        start: pos,
                                        end:
                                            pos +
                                            Math.max(n.textContent.length, 1),
                                    };

                                    // stop recurring if result is found
                                    return false;
                                }
                                return undefined;
                            },
                        );

                        return DecorationSet.create(tr.doc, [
                            Decoration.widget(markPos.start, (view, getPos) => {
                                return new Text("[");
                            }),
                            Decoration.widget(markPos.end, (view, getPos) => {
                                const parent = document.createElement("span");
                                parent.innerHTML = "]";
                                parent.append(
                                    createElement(`
                                        <span data-controller='milkdown-link'>(<small class="font-light text-nord8">link: </small><input
                                              size="${
                                                  mark.attrs.href.length + 1
                                              }"

                                              placeholder="empty"
                                              class="rounded border-none bg-slate-50 py-0 px-2 ring-1 dark:bg-slate-900"
                                              type="text"
                                              value="${
                                                  mark.attrs.href === "#"
                                                      ? ""
                                                      : mark.attrs.href
                                              }"
                                              data-milkdown-link-target='href'
                                              data-action='blur->milkdown-link#update milkdown-link#updateSize'
                                              autofocus
                                            />&nbsp;<small class="font-light text-nord8">title: </small>&quot;<input
                                              size="${
                                                  mark.attrs.title?.length || 5
                                              }"
                                              placeholder="empty"
                                              class="rounded border-none bg-slate-50 py-0 px-2 ring-1 dark:bg-slate-900"
                                              type="text"
                                              value="${mark.attrs.title || ""}"
                                              data-milkdown-link-target='title'
                                              data-action='blur->milkdown-link#update milkdown-link#updateSize'
                                            />&quot;)</span>
                                `),
                                );

                                return parent;
                            }),
                        ]);
                    },
                },
                props: {
                    decorations(state) {
                        return this.getState(state);
                    },
                    handleDOMEvents: {
                        blur: (view, e) => {
                            focused = false;
                        },
                        focus: (view, e) => {
                            focused = true;
                        },
                        keydown: (view, e) => {
                            if (e.keyCode === 8 && focused === false) {
                                e.preventDefault();
                                e.stopPropagation();

                                backspace(document.getSelection().focusNode);
                            }
                        },
                        paste(view, e) {
                            const selection = view.state.selection;

                            const node = view.state.doc.nodeAt(selection.from);

                            const mark = node?.marks.find(
                                (mark) => mark.type.name === "link",
                            );

                            if (!mark) return;

                            e.preventDefault();
                            e.stopPropagation();

                            document.getSelection().focusNode.value = (
                                e.clipboardData || window.clipboardData
                            ).getData("text");
                        },
                    },
                },
            }),
    );
};

export const link = linkPlugin();
