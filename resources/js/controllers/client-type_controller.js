import { Controller } from "@hotwired/stimulus";
import { HTMLToJSON } from "html-to-json-parser";

// Connects to data-controller="client-type"
export default class extends Controller {
    static targets = ["hideable", "showable", "select"];

    static values = {
        hideif: String,
        showif: String,
    };

    connect() {
        this.handle();
    }

    handle() {
        if (this.selectTarget.value == this.hideifValue) {
            this.hideableTargets.forEach((element) => {
                element.style.display = "none";
                element.removeAttribute("data-client-type-target");
                element.setAttribute("data-client-type-target", "showable");
            });

            console.log(this.showableTargets);
        }

        if (this.selectTarget.value == this.showifValue) {
            this.showableTargets.forEach((element) => {
                element.style.display = "block";
                element.removeAttribute("data-client-type-target");
                element.setAttribute("data-client-type-target", "hideable");
            });
        }
    }
}
