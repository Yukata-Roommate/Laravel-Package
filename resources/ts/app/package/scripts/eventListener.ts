/*****************************************
 * Package Scripts
 *
 * Event Listener
 *****************************************/

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

/**
 * Add Event Listener
 *
 * @param {string} selector
 * @param {string} event
 * @param {Function} callback
 * @param {boolean} useCapture
 * @return {void}
 */
export function addEventListener(
    selector: string,
    event: string,
    callback: Function,
    useCapture: boolean = false
): void {
    document.addEventListener(
        event,
        function (event) {
            if (!(event.target instanceof Element)) return;

            const target = event.target.closest(selector);

            if (!target) return;

            callback(event, target);
        },
        useCapture
    );
}
