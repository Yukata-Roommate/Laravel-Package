/*****************************************
 * Package Scripts Markdown
 *
 * Editor Preview Button
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { Modal } from "bootstrap";

import { Markdown } from "../../../modules/markdown";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { showPreview };

/*----------------------------------------*
 * Method
 *----------------------------------------*/

/**
 * show preview of markdown content
 *
 * @param {Event} event
 * @param {HTMLElement} element
 * @returns {void}
 */
function showPreview(event: Event, element: HTMLElement): void {
    const targetId = element.dataset.target;

    if (!targetId) return;

    const target = document.getElementById(targetId) as HTMLTextAreaElement;

    if (!target) return;

    const value = target.value;

    const previewModal = document.getElementById("markdown-preview-modal");

    if (!previewModal) return;

    const previewModalBody = previewModal.querySelector(".modal-body");

    if (!previewModalBody) return;

    previewModalBody.innerHTML = Markdown.toHtml(value);

    const modal = new Modal(previewModal);

    modal.show();
}
