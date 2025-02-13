/*****************************************
 * Package Scripts Markdown
 *
 * Copy Button
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { addEventListener } from "../eventListener";

/*----------------------------------------*
 * Event Listener
 *----------------------------------------*/

document.addEventListener("DOMContentLoaded", function () {
    addEventListener(
        ".code-block-container",
        "mouseenter",
        addMouseEnterCodeBlockContainerEventListener,
        true
    );

    addEventListener(
        ".code-block-container",
        "mouseleave",
        addMouseLeaveCodeBlockContainerEventListener,
        true
    );

    addEventListener(
        ".code-block__copy-button",
        "click",
        addClickCopyButtonEventListener
    );
});

/**
 * add mouse enter code block container event listener
 *
 * @param {Event} event
 * @param {Element} target
 * @return {void}
 */
function addMouseEnterCodeBlockContainerEventListener(
    event: Event,
    target: Element
): void {
    const copyButton = target.querySelector(
        ".code-block__copy-button"
    );

    if (!copyButton) return;

    copyButton.classList.add("hover");
}

/**
 * add mouse leave code block container event listener
 *
 * @param {Event} event
 * @param {Element} target
 * @return {void}
 */
function addMouseLeaveCodeBlockContainerEventListener(
    event: Event,
    target: Element
): void {
    const copyButton = target.querySelector(
        ".code-block__copy-button"
    );

    if (!copyButton) return;

    copyButton.classList.remove("hover");
}

/**
 * add click copy button event listener
 *
 * @param {Event} event
 * @param {Element} target
 * @return {void}
 */
function addClickCopyButtonEventListener(event: Event, target: Element): void {
    const codeBlockInner = target.parentElement?.querySelector(
        ".code-block-inner"
    );

    if (!codeBlockInner) return;

    const copyText = codeBlockInner.textContent;

    if (!copyText) return;

    if (!navigator.clipboard) {
        target.classList.add("error");
        target.textContent = "Not supported";

        setTimeout(function () {
            target.classList.remove("error");
            target.textContent = "Copy";
        }, 3000);

        return;
    }

    navigator.clipboard.writeText(copyText).then(
        function () {
            target.classList.add("success");
            target.textContent = "Copied";

            setTimeout(function () {
                target.classList.remove("success");
                target.textContent = "Copy";
            }, 3000);
        },
        function () {
            target.classList.add("error");
            target.textContent = "Failed to copy";

            setTimeout(function () {
                target.classList.remove("error");
                target.textContent = "Copy";
            }, 3000);
        }
    );
}
