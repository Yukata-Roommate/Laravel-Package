/*****************************************
 * Package Scripts Markdown
 *
 * Editor
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { addEventListener } from "../eventListener";

import { toggleCommandAccordion } from "./editor/commandButton";
import { showPreview } from "./editor/previewButton";

/*----------------------------------------*
 * Event Listener
 *----------------------------------------*/

document.addEventListener("DOMContentLoaded", function () {
    addEventListener(
        ".markdown-command-button",
        "click",
        toggleCommandAccordion
    );

    addEventListener(".markdown-preview-button", "click", showPreview);
});
