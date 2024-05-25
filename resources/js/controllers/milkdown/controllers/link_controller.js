import { Controller } from "@hotwired/stimulus";
import { commandsCtx } from "@milkdown/core";
import { updateLinkCommand } from "@milkdown/preset-commonmark";
import { useInstance } from "../editor";

export default class extends Controller {
    static targets = ["href", "title"];

    connect() {
        this.updateSize();
    }

    updateSize() {
        this.hrefTarget.style.width =
            this.hrefTarget.value.trim().length + "ch";

        this.titleTarget.style.width = this.titleTarget.value.length + "ch";
    }

    update(e) {
        useInstance().action((ctx) => {
            ctx.get(commandsCtx).call(updateLinkCommand.key, {
                href: this.hrefTarget.value,
                title: this.titleTarget.value,
            });
        });
    }
}
