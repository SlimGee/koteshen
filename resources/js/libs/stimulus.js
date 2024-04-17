import { Application } from "@hotwired/stimulus";
import Dropdown from "@stimulus-components/dropdown";
import TextareaAutogrow from "stimulus-textarea-autogrow";

const Stimulus = Application.start();

Stimulus.register("dropdown", Dropdown);
Stimulus.register("textarea-autogrow", TextareaAutogrow);
// Configure Stimulus development experience
Stimulus.debug = false;

window.Stimulus = Stimulus;

export { Stimulus };
