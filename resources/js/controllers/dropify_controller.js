import { Controller } from "@hotwired/stimulus";
import { Dropify } from "./dropify";
import "dropify/dist/css/dropify.css";

// Connects to data-controller="dropify"
export default class extends Controller {
    static targets = ["input"];

    connect() {
        this.dropify = new Dropify(this.inputTarget, this.inputTarget.dataset);
    }

    disconnect() {
        this.dropify.destroy();
    }
}
