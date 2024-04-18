import { Controller } from "@hotwired/stimulus";
import iziToast from "izitoast";
import "izitoast/dist/css/iziToast.css";

// Connects to data-controller="toast"
export default class extends Controller {
    static values = {
        type: String,
        message: String,
    };

    connect() {
        iziToast[this.typeValue]({
            title: this.typeValue == "success" ? "OK" : "Error",
            message: this.messageValue,
        });
    }
}
