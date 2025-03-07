/*****************************************
 * Package Scripts Form
 *
 * Textarea
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { addEventListener } from "../eventListener";

/*----------------------------------------*
 * Event Listener
 *----------------------------------------*/

document.addEventListener("DOMContentLoaded", function () {
    addEventListener("textarea", "keydown", addTab);
});

/*----------------------------------------*
 * Methods
 *----------------------------------------*/

/**
 * add tab to textarea
 *
 * @param {KeyboardEvent} event
 * @param {HTMLTextAreaElement} textarea
 * @return {void}
 */
function addTab(
    event: KeyboardEvent,
    textarea: HTMLTextAreaElement
): void {
    if (event.key !== "Tab") return;

    event.preventDefault();

    const length = textarea.value.length;
    const cursor = textarea.selectionStart;
    const left = textarea.value.substring(0, cursor);
    const right = textarea.value.substring(cursor, length);

    textarea.value = left + "\t" + right;

    textarea.selectionEnd = cursor + 1;
}
