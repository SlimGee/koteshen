import { Controller } from "@hotwired/stimulus";
import { useClickOutside } from "stimulus-use";

// Connects to data-controller="menu"
export default class extends Controller {
    static targets = ["menu"];
    connect() {
        useClickOutside(this, { element: this.menuTarget });
    }

    toggle() {
        if (this.menuTarget.classList.contains("-translate-x-full")) {
            this.open();
        } else {
            this.close();
        }
    }

    open() {
        this.menuTarget.classList.remove("-translate-x-full");
        this.menuTarget.classList.add("shadow-lg");
    }

    close() {
        this.menuTarget.classList.add("-translate-x-full");
        this.menuTarget.classList.remove("shadow-lg");
    }
}
