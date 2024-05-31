import { Controller } from "@hotwired/stimulus";

// Connects to data-controller="tax"
export default class extends Controller {
    static targets = [
        "template",
        "items",
        "toggle",
        "form",
        "taxes",
        "formTemplate",
        "formContainer",
    ];

    static values = { taxes: Array, selected: Array };

    connect() {}

    create() {
        const options = this.taxesValue.map((tax) => {
            return `<option value='${JSON.stringify(tax)}'>${tax.name}(%${
                tax.rate
            })</option>`;
        });
        this.formContainerTarget.innerHTML = this.formTemplateTarget.innerHTML;
        this.formTarget.innerHTML = options.join("");
        this.formTarget
            .closest("div")
            .setAttribute("data-controller", "choices");
        this.itemsTarget.classList.remove("hidden");
        this.toggleTarget.classList.add("hidden");
    }

    select() {
        const selected = JSON.parse(this.formTarget.value);
        this.add(selected);

        this.taxesValue = this.taxesValue.filter(
            (tax) => tax.id !== selected.id,
        );

        this.formContainerTarget.innerHTML = "";
        this.itemsTarget.classList.add("hidden");
        if (this.taxesValue.length > 0) {
            this.toggleTarget.classList.remove("hidden");
        }
    }

    add(taxObject) {
        console.log(JSON.stringify(JSON.stringify(taxObject)));
        const template = this.templateTarget.innerHTML;
        const html = template
            .replace(/NAME/g, `${taxObject.name} (%${taxObject.rate})`)
            .replace(/TAXID/g, taxObject.id)
            .replace(/AMOUNT/g, JSON.stringify(taxObject.rate))
            .replace(/RATE/g, taxObject.rate);

        this.itemsTarget.insertAdjacentHTML("beforebegin", html);
    }
}
