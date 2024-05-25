import { application } from "../../../libs/stimulus";
import ToolbarController from "./toolbar_controller.js";
import slash_controller from "./slash_controller.js";
import link_controller from "./link_controller.js";
import tooltip_controller from "./tooltip_controller.js";

export const registerEditorControllers = () => {
    application.register("milkdown-toolbar", ToolbarController);
    application.register("milkdown-slash", slash_controller);
    application.register("milkdown-link", link_controller);
    application.register("milkdown-tooltip", tooltip_controller);
};
