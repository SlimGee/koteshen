import { Controller } from "@hotwired/stimulus";

// Connects to data-controller="tax-record"
export default class extends Controller {
    static targets = ["value", "name"];

    connect() {
        this.dispatch("created");
        this.element.insertAdjacentHTML(
            "beforeend",
            `<input type="text" name="tax_records[${this.index}][name]" value="${this.nameTarget.value}">`,
        );
    }
}
