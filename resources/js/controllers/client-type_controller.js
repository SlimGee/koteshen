import { Controller } from "@hotwired/stimulus";
import { HTMLToJSON } from "html-to-json-parser";

// Connects to data-controller="client-type"
export default class extends Controller {
    static targets = ["hideable", "showable", "select"];

    static values = {
        hideif: String,
        showif: String,
    };

    elementMap;
    removedElements = [];

    connect() {
        this.elementMap = new WeakMap();
        this.handle();
    }

    removeAndRestore(element) {
        const parentNode = element.parentNode;
        const nextSibling = element.nextSibling;
        element.remove();
        this.elementMap.set(element, { parentNode, nextSibling });
    }

    restore(element) {
        const { parentNode, nextSibling } = this.elementMap.get(element);
        if (nextSibling) {
            parentNode.insertBefore(element, nextSibling);
        } else {
            parentNode.appendChild(element);
        }
        this.elementMap.delete(element);
    }

    handle() {
        if (this.selectTarget.value == this.hideifValue) {
            this.hideableTargets.forEach((element) => {
                this.removeAndRestore(element);
                this.removedElements.push(element);
            });
        }

        if (this.selectTarget.value == this.showifValue) {
            this.removedElements.forEach((element) => {
                this.restore(element);
            });
        }
    }
}
