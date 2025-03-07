/*****************************************
 * Package Module File
 *
 * Index
 *****************************************/

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class File {
    /**
     * get name
     *
     * @return {string}
     */
    static get name(): string {
        return _file.name;
    }

    /**
     * set name
     *
     * @param {string} name
     */
    static set name(name: string) {
        _file.name = name;
    }

    /**
     * get type
     *
     * @return {string}
     */
    static get type(): string {
        return _file.type;
    }

    /**
     * set type
     *
     * @param {string} type
     */
    static set type(type: string) {
        _file.type = type;
    }

    /**
     * get content
     *
     * @return {string}
     */
    static get content(): string {
        return _file.content;
    }

    /**
     * set content
     *
     * @param {string} content
     */
    static set content(content: string) {
        _file.content = content;
    }

    /**
     * download
     *
     * @return {void}
     */
    static download(): void {
        _file.download();
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * File
 */
class _File {
    /*----------------------------------------*
     * Property
     *----------------------------------------*/

    /**
     * name
     *
     * @type {string}
     */
    name: string = "";

    /**
     * type
     *
     * @type {string}
     */
    type: string = "";

    /**
     * content
     *
     * @type {string}
     */
    content: string = "";

    /*----------------------------------------*
     * Download
     *----------------------------------------*/

    /**
     * download
     *
     * @return {void}
     */
    download(): void {
        const anchor = this.makeDownloadAnchor();

        anchor.click();

        window.URL.revokeObjectURL(anchor.href);

        this.name = "";
        this.type = "";
        this.content = "";
    }

    /**
     * make download anchor
     *
     * @return {HTMLAnchorElement}
     */
    private makeDownloadAnchor(): HTMLAnchorElement {
        const anchor = document.createElement("a");

        anchor.href = window.URL.createObjectURL(this.makeDownloadFile());
        anchor.download = this.name;

        return anchor;
    }

    /**
     * make download file
     *
     * @return {Blob}
     */
    private makeDownloadFile(): Blob {
        return new Blob([this.content], { type: this.type });
    }
}

/**
 * File
 *
 * @type {_File}
 */
const _file: _File = new _File();
