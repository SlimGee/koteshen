import * as Turbo from "@hotwired/turbo";

Turbo.setConfirmMethod((message, element) => {
    let dialog = document.getElementById("turbo-confirm");
    if (!dialog) {
        dialog = document.createElement("dialog");
        dialog.id = "turbo-confirm";
        dialog.classList.add(
            ..."bg-slate-900 bg-opacity-25 overflow-y-auto !m-0 overflow-x-hidden fixed top-0 w-screen h-screen -right-2 left-0 z-50 flex flex-row justify-center items-center min-h-full min-w-full".split(
                " ",
            ),
        );
        dialog.innerHTML = `
            <div class="relative p-4 w-full max-w-md max-h-full mx-auto my-auto">
                <div class="relative bg-white rounded shadow border">
                    <form method="dialog">
                        <div class="p-4 md:p-5 text-center dialog-body">
                            <svg class="mx-auto mb-4 text-slate-400 w-12 h-12 dark:text-slate-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-slate-500 dark:text-slate-400">Are you sure you want to delete this product?</h3>
                            <button value="confirm" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button value="cancel"  class="text-slate-500 bg-white hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-200 rounded border border-slate-200 text-sm font-medium px-5 py-2.5 hover:text-slate-900 focus:z-10 dark:bg-slate-700 dark:text-slate-300 dark:border-slate-500 dark:hover:text-white dark:hover:bg-slate-600 dark:focus:ring-slate-600">No, cancel</button>
                        </div>
                    </form>
                </div>
            </div>
                   `;
        document.body.appendChild(dialog);
    }

    dialog.showModal();
    dialog.querySelector(".dialog-body h3").textContent = message;

    return new Promise((resolve, reject) => {
        dialog.addEventListener(
            "close",
            (e) => {
                dialog.remove();
                resolve(dialog.returnValue == "confirm");
            },
            { once: true },
        );
    });
});

export default Turbo;
