import { ApplicationController as Controller, useDebounce } from "stimulus-use";

// Connects to data-controller="line-item"
export default class extends Controller {
    static targets = ["quantity", "price", "total", "symbol"];
    static values = { currency: Object };
    static debounces = ["updateTotal"];

    connect() {
        useDebounce(this);
        this.updateTotal();
    }

    currencyValueChanged() {
        this.symbolTargets.forEach((symbol) => {
            symbol.textContent = this.currencyValue.symbol || "USD";
        });
    }

    setCurrentCurrency(event) {
        const currency = event.detail.client.currency;
        this.currencyValue = currency;
    }

    updateTotal() {
        const quantity = parseInt(this.quantityTarget.value) || 0;
        const price = parseFloat(this.priceTarget.value) || 0;
        const total = quantity * price;

        this.totalTarget.value = total.toFixed(
            this.currencyValue.rounding || 2,
        );

        super.dispatch("total", { detail: total });
    }

    remove() {
        this.element.remove();
    }
}
