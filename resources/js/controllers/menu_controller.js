import { Controller } from "@hotwired/stimulus";
import { useClickOutside } from "stimulus-use";

// Connects to data-controller="menu"
export default class extends Controller {
    static targets = ["menu"];
    static classes = ["toggle"];
    connect() {
        useClickOutside(this, { element: this.menuTarget });
    }

    toggle() {
        if (this.menuTarget.classList.contains(this.toggleClass)) {
            this.open();
        } else {
            this.close();
        }
    }

    open() {
        this.menuTarget.classList.remove(this.toggleClass);
        this.menuTarget.classList.add("shadow-lg");
    }

    close() {
        this.menuTarget.classList.add(this.toggleClass);
        this.menuTarget.classList.remove("shadow-lg");
    }
}
