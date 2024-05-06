import { Controller } from "@hotwired/stimulus";
import AirDatepicker from "air-datepicker";
import localeEn from "air-datepicker/locale/en";
import { createPopper } from "@popperjs/core";
import "air-datepicker/air-datepicker.css";

// Connects to data-controller="datepicker"
export default class extends Controller {
    connect() {
        new AirDatepicker(this.element, {
            selectedDates: [this.element.value || new Date()],
            locale: localeEn,
        });
    }
}
