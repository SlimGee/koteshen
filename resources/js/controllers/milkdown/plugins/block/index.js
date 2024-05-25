import { block, BlockProvider } from "@milkdown/plugin-block";

export const Block = (ctx) => {
    return (view) => {
        const content = document.createElement("div");

        content.innerHTML = `
        <div class="w-6 bg-nord text-nord10 rounded hover:border hover:border-nord10  cursor-grab">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
            </svg>
          </div>`.trim();

        const provider = new BlockProvider({
            ctx,
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
};

export { block };
