import { Controller } from "@hotwired/stimulus";

// Connects to data-controller="invoice"
export default class extends Controller {
    static targets = [
        "select",
        "clientTemplate",
        "customDueDate",
        "customDueDateTemplate",
        "customDateSelect",
        "lineItem",
    ];

    currency;

    connect() {
        this.selectDueDate({ target: this.customDateSelectTarget });
        this.selectClient({
            target: this.selectTarget.querySelector("select"),
        });
        this.ensureLineItemExists();
    }

    ensureLineItemExists() {
        if (this.lineItemTargets.length === 0) {
            this.addLineItem();
        }
        if (this.lineItemTargets.length === 1) {
            this.lineItemTargets[0]
                .querySelector("[data-remove]")
                .classList.add("hidden");
        }
    }

    updateTotal() {
        const total = Array.from(this.lineItemTargets).reduce((acc, item) => {
            const price = parseFloat(item.querySelector("[name=rate]").value);
            return acc + price;
        }, 0);
        this.totalTarget.value = total.toFixed(2);
    }

    selectClient({ target }) {
        if (
            ["", "Select client", "please select a client"].includes(
                target.value,
            )
        )
            return;
        const client = JSON.parse(target.value);
        this.currency = client.currency;
        this.dispatch("client-selected", { detail: { client } });
        const html = this.clientTemplateTarget.innerHTML
            .replace(/NAME/, client.name)
            .replace(/ADDRESS/, client.address)
            .replace(/CITY/, client.city)
            .replace(/COUNTRY/, client.country)
            .replace(/PHONE/, client.phone)
            .replace(/EMAIL/, client.email);

        this.selectTarget.parentElement.insertAdjacentHTML("beforeend", html);
        this.selectTarget.classList.add("hidden");
    }

    removeClient({ target }) {
        target.closest("div").parentElement.remove();
        this.selectTarget.classList.remove("hidden");
    }

    selectDueDate({ target }) {
        if (target.value === "custom") {
            const html = this.customDueDateTemplateTarget.innerHTML;
            this.customDueDateTarget.insertAdjacentHTML("beforeend", html);
            this.customDueDateTarget.classList.remove("hidden");
        } else {
            this.customDueDateTarget.innerHTML = "";
            this.customDueDateTarget.classList.add("hidden");
        }
    }
}
