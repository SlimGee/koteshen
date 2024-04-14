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
        "lineItemTemplate",
        "lineItemsContainer",
        "currencyCode",
        "total",
        "subtotal",
        "balance",
        "currency",
    ];

    static values = { currency: Object };

    connect() {
        this.selectDueDate({ target: this.customDateSelectTarget });
        this.selectClient({
            target: this.selectTarget.querySelector("select"),
        });
        this.ensureLineItemExists();
    }

    currencyValueChanged() {
        this.lineItemTargets.forEach((lineItem) => {
            lineItem.setAttribute(
                "data-line-item-currency-value",
                JSON.stringify(this.currencyValue),
            );
        });

        this.currencyCodeTargets.forEach((code) => {
            code.textContent = this.currencyValue.code || "USD";
        });

        this.dispatch("currency-changed", { detail: this.currencyValue.id });
    }

    ensureLineItemExists() {
        if (this.lineItemTargets.length === 0) {
            this.addLineItem();
        }
    }

    addLineItem({ target } = { target: null }) {
        if (target) {
            target.blur();
        }
        const html = this.lineItemTemplateTarget.innerHTML;
        this.lineItemsContainerTarget.insertAdjacentHTML("beforeend", html);
        this.lineItemTargets
            .at(-1)
            .setAttribute(
                "data-line-item-currency-value",
                JSON.stringify(this.currencyValue),
            );
    }

    updateTotal() {
        const total = Array.from(this.lineItemTargets)
            .reduce((acc, item) => {
                const price = parseFloat(
                    item.querySelector("[name=total]").value,
                );
                return acc + price;
            }, 0)
            .toFixed(this.currencyValue.rounding || 2);

        this.totalTarget.textContent = total;
        this.balanceTarget.textContent = total;
        this.subtotalTarget.textContent = total;
    }

    selectClient({ target }) {
        if (
            ["", "Select client", "please select a client"].includes(
                target.value,
            )
        )
            return;

        const client = JSON.parse(target.value);

        this.currencyValue = client.currency;
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
