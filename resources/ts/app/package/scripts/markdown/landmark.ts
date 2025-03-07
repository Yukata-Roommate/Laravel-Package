/*****************************************
 * Package Scripts Markdown
 *
 * Landmark
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { Markdown } from "../../modules/markdown";

/*----------------------------------------*
 * Event Listener
 *----------------------------------------*/

document.addEventListener("DOMContentLoaded", function () {
    const markdowns = document.querySelectorAll(".markdown-landmark");

    markdowns.forEach(function (markdown) {
        try {
            markdown.innerHTML = Markdown.toHtml(markdown.innerHTML);
        } catch (error) {}
    });
});
