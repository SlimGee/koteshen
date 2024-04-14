import { ApplicationController as Controller, useDebounce } from "stimulus-use";

// Connects to data-controller="line-item"
export default class extends Controller {
    static targets = ["quantity", "price", "total"];
    static values = { currency: Object };
    static debounces = ["updateTotal"];

    connect() {
        useDebounce(this);
    }

    setCurrentCurrenc(event) {
        console.log(event);
        const currency = event.detail.currency;
        this.currencyValue = currency;
    }

    updateTotal() {
        const quantity = parseInt(this.quantityTarget.value) || 0;
        const price = parseFloat(this.priceTarget.value) || 0;
        const total = quantity * price;

        this.totalTarget.value = total.toFixed(
            this.currencyValue.rounding || 2,
        );
    }
}
