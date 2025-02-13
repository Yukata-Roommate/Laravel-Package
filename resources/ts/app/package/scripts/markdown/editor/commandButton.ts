/*****************************************
 * Package Scripts Markdown
 *
 * Editor Command Button
 *****************************************/

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { toggleCommandAccordion };

/*----------------------------------------*
 * Method
 *----------------------------------------*/

/**
 * toggle command accordion
 *
 * @param {Event} event
 * @param {HTMLElement} element
 * @returns {void}
 */
function toggleCommandAccordion(event: Event, element: HTMLElement): void {
    const targetId = element.dataset.target;

    if (!targetId) return;

    const target = document.getElementById(targetId);

    if (!target) return;

    target.classList.toggle("active");
}
