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
        "taxes",
        "discount",
    ];

    static values = {
        currency: Object,
        clients: Array,
        currencies: Array,
    };

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

    setCurrentCurrey({ target }) {
        const currency = this.currenciesValue.find(
            (item) => item.id == target.value,
        );
        this.currencyValue = currency;
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
        const html = this.lineItemTemplateTarget.innerHTML.replaceAll(
            /INDEX/g,
            this.lineItemTargets.length,
        );
        this.lineItemsContainerTarget.insertAdjacentHTML("beforeend", html);
        this.lineItemTargets
            .at(-1)
            .setAttribute(
                "data-line-item-currency-value",
                JSON.stringify(this.currencyValue),
            );
    }

    taxesTargetDisconnected() {
        this.updateTotal();
    }

    updateTotal() {
        let before = Array.from(this.lineItemTargets)
            .reduce((acc, item) => {
                const price = parseFloat(
                    item.querySelector("[name=total]").value,
                );
                return acc + price;
            }, 0)
            .toFixed(this.currencyValue.rounding || 2);

        const rate = Number(this.discountTarget.value);
        const discount = (rate / 100) * before;

        let subtotal = before - discount;

        this.subtotalTarget.textContent = Number(before).toFixed(2);
        let total = Number(subtotal);
        let additions = 0;

        this.taxesTargets.forEach((tax) => {
            const rate = parseFloat(tax.dataset.rate);
            const amount = (rate / 100) * subtotal;
            additions += amount;
            tax.textContent = amount.toFixed(2);
        });

        total = Number(total) + Number(additions);

        this.balanceTarget.textContent = total.toFixed(2);
        this.totalTarget.textContent = total.toFixed(2);

        this.dispatch("total", { detail: total });
    }

    selectClient({ target }) {
        if (
            ["", "Select client", "please select a client"].includes(
                target.value,
            )
        )
            return;

        const client = this.clientsValue.find((item) => {
            return item.id == target.value;
        });

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
