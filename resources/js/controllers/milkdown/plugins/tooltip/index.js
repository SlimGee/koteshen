import { tooltipFactory, TooltipProvider } from "@milkdown/plugin-tooltip";
import { TextSelection } from "@milkdown/prose/state";

export const Tooltip = (view) => {
    const content = document.createElement("div");
    content.innerHTML = `
        <div class='' role='tooltip' data-controller='milkdown-tooltip'>
            <template data-milkdown-tooltip-target="template">
                <span class="material-symbols-outlined p-2 border-r dark:hover:bg-slate-700 dark:border-slate-700 cursor-pointer" data-milkdown-tooltip-target="item" data-milkdown-tooltip-index-param="INDEX" data-action="mousedown->milkdown-tooltip#command" data-label="strikethrough">
                    ICON
                </span>
            </template>
            <div class="bg-slate-200 dark:bg-slate-900  border dark:border-slate-700 shadow tooltip flex rounded " data-milkdown-tooltip-target='container'>
            </div>
        </div>
    `.trim();

    const provider = new TooltipProvider({
        content: content,
        shouldShow: (view) => {
            const { doc, selection } = view.state;
            const { empty, from, to } = selection;

            const isEmptyTextBlock =
                !doc.textBetween(from, to).length &&
                view.state.selection instanceof TextSelection;

            const isTooltipChildren = provider.element.contains(
                document.activeElement,
            );

            const notHasFocus = !view.hasFocus() && !isTooltipChildren;

            const isReadonly = !view.editable;

            if (notHasFocus || empty || isEmptyTextBlock || isReadonly)
                return false;

            return !(view.state.doc.nodeAt(from)?.type.name === "image");
        },
    });

    return {
        update: (updatedView, prevState) => {
            provider.update(updatedView, prevState);
        },
        destroy: () => {
            provider.destroy();
            content.remove();
        },
    };
};

export const tooltip = tooltipFactory("selection-tooltip");
