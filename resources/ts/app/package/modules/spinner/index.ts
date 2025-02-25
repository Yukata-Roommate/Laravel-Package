/*****************************************
 * Package Module Spinner
 *
 * Index
 *****************************************/

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Spinner {
    /**
     * show
     *
     * @param {SpinnerText | undefined} type
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    public static show(type?: SpinnerText, spinnerId?: string): void {
        _spinner.show(type, spinnerId);
    }

    /**
     * hide
     *
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    public static hide(spinnerId?: string): void {
        _spinner.hide(spinnerId);
    }
}

/*----------------------------------------*
 * Spinner Text
 *----------------------------------------*/

type SpinnerText =
    | "waiting"
    | "loading"
    | "processing"
    | "saving"
    | "deleting"
    | "fetching"
    | "searching"
    | "submitting";

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Spinner
 */
class _Spinner {
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * show spinner class
     *
     * @type {string}
     */
    private showSpinnerClass: string = "show";

    /**
     * spinner text class
     *
     * @type {string}
     */
    private spinnerTextClass: string = "spinner-text";

    /**
     * show spinner text class
     *
     * @type {string}
     */
    private showSpinnerTextClass: string = "show";

    /*----------------------------------------*
     * Show
     *----------------------------------------*/

    /**
     * show
     *
     * @param {SpinnerText | undefined} type
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    show(type?: SpinnerText, spinnerId?: string): void {
        this.showSpinner(spinnerId);
        this.showSpinnerText(type, spinnerId);
    }

    /**
     * show spinner
     *
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    private showSpinner(spinnerId?: string): void {
        const spinner = this.getSpinner(spinnerId);

        if (!spinner) return;

        spinner.classList.add(this.showSpinnerClass);
    }

    /**
     * show spinner text
     *
     * @param {SpinnerText | undefined} type
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    private showSpinnerText(type?: SpinnerText, spinnerId?: string): void {
        const spinnerText = this.getSpinnerText(type, spinnerId);

        if (!spinnerText) return;

        spinnerText.classList.add(this.showSpinnerTextClass);
    }

    /*----------------------------------------*
     * Hide
     *----------------------------------------*/

    /**
     * hide
     *
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    hide(spinnerId?: string): void {
        this.hideSpinner(spinnerId);
        this.hideSpinnerTexts(spinnerId);
    }

    /**
     * hide spinner
     *
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    private hideSpinner(spinnerId?: string): void {
        const spinner = this.getSpinner(spinnerId);

        if (!spinner) return;

        spinner.classList.remove(this.showSpinnerClass);
    }

    /**
     * hide spinner texts
     *
     * @param {string | undefined} spinnerId
     * @returns {void}
     */
    private hideSpinnerTexts(spinnerId?: string): void {
        const spinnerTexts = this.getSpinnerTexts(spinnerId);

        if (!spinnerTexts) return;

        for (let i = 0; i < spinnerTexts.length; i++) {
            spinnerTexts[i].classList.remove(this.showSpinnerTextClass);
        }
    }

    /*----------------------------------------*
     * Common
     *----------------------------------------*/

    /**
     * get spinner
     *
     * @param {string | undefined} spinnerId
     * @returns {HTMLElement | null}
     */
    private getSpinner(spinnerId?: string): HTMLElement | null {
        return document.getElementById(spinnerId || "spinner");
    }

    /**
     * get spinner text
     *
     * @param {SpinnerText | undefined} type
     * @param {string | undefined} spinnerId
     * @returns {HTMLElement | null}
     */
    private getSpinnerText(
        type?: SpinnerText,
        spinnerId?: string
    ): HTMLElement | null {
        return this.getSpinner(spinnerId)?.getElementsByClassName(
            this.getSpinnerTextClassName(type)
        )[0] as HTMLElement;
    }

    /**
     * get spinner text class
     *
     * @param {SpinnerText | undefined} type
     * @returns {string}
     */
    private getSpinnerTextClassName(type?: SpinnerText): string {
        switch (type) {
            case "waiting":
                return "spinner-text-waiting";
            case "loading":
                return "spinner-text-loading";
            case "processing":
                return "spinner-text-processing";
            case "saving":
                return "spinner-text-saving";
            case "deleting":
                return "spinner-text-deleting";
            case "fetching":
                return "spinner-text-fetching";
            case "searching":
                return "spinner-text-searching";
            case "submitting":
                return "spinner-text-submitting";
            default:
                return "spinner-text-waiting";
        }
    }

    /**
     * get spinner texts
     *
     * @param {string | undefined} spinnerId
     * @returns {HTMLCollectionOf<HTMLElement> | null}
     */
    private getSpinnerTexts(
        spinnerId?: string
    ): HTMLCollectionOf<HTMLElement> | null {
        return this.getSpinner(spinnerId)?.getElementsByClassName(
            this.spinnerTextClass
        ) as HTMLCollectionOf<HTMLElement>;
    }
}

/**
 * Spinner
 *
 * @type {_Spinner}
 */
const _spinner: _Spinner = new _Spinner();
