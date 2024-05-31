import { Controller } from "@hotwired/stimulus";

// Connects to data-controller="tax-record"
export default class extends Controller {
    static targets = ["value", "name"];

    connect() {
        this.dispatch("created");
    }

    remove() {
        this.element.remove();
    }
}
