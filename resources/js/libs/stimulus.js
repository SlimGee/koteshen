import { Application } from "@hotwired/stimulus";
import Dropdown from "@stimulus-components/dropdown";
import TextareaAutogrow from "stimulus-textarea-autogrow";
import { Tabs } from "tailwindcss-stimulus-components";

const Stimulus = Application.start();

Stimulus.register("dropdown", Dropdown);
Stimulus.register("textarea-autogrow", TextareaAutogrow);
Stimulus.register("tabs", Tabs);
// Configure Stimulus development experience
Stimulus.debug = false;

window.Stimulus = Stimulus;
const application = Stimulus;

export { Stimulus, application };
