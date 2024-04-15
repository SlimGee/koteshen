import { Controller } from "@hotwired/stimulus";
import Turbo from "../libs/turbo";
import { useDebounce } from "stimulus-use";

// Connects to data-controller="search"
export default class extends Controller {
    static debounces = ["search"];
    static values = { url: String };

    connect() {
        useDebounce(this, { wait: 500 });

        if (this.element.value.trim().length > 0) {
            this.element.focus();
            this.element.setSelectionRange(
                this.element.value.length,
                this.element.value.length,
            );
        }

        console.log("connected to search");
    }

    search(event) {
        console.log(
            this.urlValue.replace(/QUERY/, event.target.value),
            event.target.value,
        );
        Turbo.visit(this.urlValue.replace(/QUERY/, event.target.value));
    }
}
