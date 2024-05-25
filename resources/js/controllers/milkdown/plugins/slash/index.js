import { SlashProvider, slashFactory } from "@milkdown/plugin-slash";

export const Slash = (view) => {
    const content = document.createElement("div");

    content.innerHTML = `
        <div class='m-0 w-96' role='tooltip' data-controller='milkdown-slash' data-milkdown-selected-value="0" data-action='keydown@window->milkdown-slash#onKeydown'>
            <template data-milkdown-slash-target='template'>
                 <div class="cursor-pointer px-6 py-3 w-96 left-0 hover:bg-slate-200 dark:hover:bg-slate-700" data-milkdown-slash-target="item" data-milkdown-slash-index-param="INDEX" data-action='selected->milkdown-slash#command mouseover->milkdown-slash#onMouseMove click->milkdown-slash#command'>
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-slate-900 dark:text-slate-400">
                            ICON
                        </span>
                        NAME
                    </div>
                </div>
             </template>
            <div class="m-0 w-96 rounded bg-slate-50 shadow dark:shadow-slate-900 border dark:border-slate-700 overflow-hidden dark:bg-slate-900" data-milkdown-slash-target='container'>

             </div>
        </div>`.trim();

    const provider = new SlashProvider({
        content,
    });

    return {
        update(updatedView, prevState) {
            provider.update(updatedView, prevState);
        },
        destroy() {
            provider.destroy();
            content.remove();
        },
    };
};

export const slash = slashFactory("default-slash");
