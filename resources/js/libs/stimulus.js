import { Application } from "@hotwired/stimulus";
import Dropdown from "@stimulus-components/dropdown";

const Stimulus = Application.start();
Stimulus.register("dropdown", Dropdown);

// Configure Stimulus development experience
Stimulus.debug = false;

window.Stimulus = Stimulus;

export { Stimulus };
