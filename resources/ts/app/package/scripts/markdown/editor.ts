/*****************************************
 * Package Scripts Markdown
 *
 * Editor
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import Modal from "bootstrap/js/dist/modal"

import { addEventListener } from "../eventListener";

import { Markdown } from "../../modules/markdown";

/*----------------------------------------*
 * Event Listener
 *----------------------------------------*/

document.addEventListener("DOMContentLoaded", function () {
    addEventListener(".markdown-editor__textarea", "keydown", showPreview);

    addEventListener(".markdown-preview-button", "click", showPreviewModal);
});

/*----------------------------------------*
 * Method
 *----------------------------------------*/

/**
 * show markdown content preview
 *
 * @param {Event} event
 * @param {HTMLTextAreaElement} element
 * @returns {void}
 */
function showPreview(event: Event, element: HTMLTextAreaElement): void {
    const targetId = element.dataset.target;

    if (!targetId) return;

    const target = document.getElementById(targetId) as HTMLElement;

    if (!target) return;

    const value = element.value;

    target.innerHTML = Markdown.toHtml(value);
}

/**
 * show markdown content preview modal
 *
 * @param {Event} event
 * @param {HTMLElement} element
 * @returns {void}
 */
function showPreviewModal(event: Event, element: HTMLElement): void {
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
