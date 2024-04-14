import { Controller } from "@hotwired/stimulus";
import Choices from "choices.js";

import "choices.js/public/assets/styles/choices.css";

// Connects to data-controller="select2"
export default class extends Controller {
    static classes = ["invalid"];

    connect() {
        const options = JSON.parse(this.data.get("config")) || {};

        const choices = new Choices(
            this.element,
            Object.assign(
                {
                    classNames: {
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
}
