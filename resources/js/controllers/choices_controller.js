import { Controller } from "@hotwired/stimulus";
import Choices from "choices.js";

import "choices.js/public/assets/styles/choices.css";

let choices;

// Connects to data-controller="select2"
export default class extends Controller {
    static classes = ["invalid"];
    static targets = ["element"];

    instance;

    wrap(el, wrapper) {
        if (el && el.parentNode) {
            el.parentNode.insertBefore(wrapper, el);
            wrapper.appendChild(el);
        }
    }

    connect() {
        if (
            this.element.type === "select-one" ||
            ["INPUT", "SELECT"].includes(this.element.nodeName)
        ) {
            this.element.setAttribute("data-choices-target", "element");
            this.element.removeAttribute("data-controller");
            const wrapper = document.createElement("div");

            this.element.parentElement.appendChild(wrapper);
            this.wrap(this.element, wrapper);
            wrapper.setAttribute("data-controller", "choices");
            return;
        }

        const options = JSON.parse(this.data.get("config")) || {};

        this.instance = new Choices(
            this.elementTarget,
            Object.assign(
                {
                    classNames: {
                        ontainerOuter: "choices",
                        containerInner:
                            "choices__inner border !border-gray-300 !p-2 !text-sm !mt-1 !bg-white",
                        input: "choices__input",
                        inputCloned: "choices__input--cloned",
                        list: "choices__list",
                        listItems: "choices__list--multiple",
                        listSingle: "choices__list--single",
                        listDropdown: "choices__list--dropdown",
                        item: "choices__item",
                        itemSelectable: "choices__item--selectable",
                        itemDisabled: "choices__item--disabled",
                        itemOption: "choices__item--choice",
                        group: "choices__group",
                        groupHeading: "choices__heading",
                        button: "choices__button",
                        activeState: "is-active",
                        focusState: "is-focused",
                        openState: "is-open",
                        disabledState: "is-disabled",
                        highlightedState: "is-highlighted",
                        selectedState: "is-selected",
                        flippedState: "is-flipped",
                        selectedState: "is-highlighted",
                    },
                },
                options,
            ),
        );
    }

    update({ detail }) {
        this.instance.setChoiceByValue(detail.toString());
    }
}
