/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Code Block
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { CodeBlockTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Code Block Tree Item
 */
type CodeBlockTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "code-block";

    /**
     * language
     *
     * @type {string}
     */
    language: string;

    /**
     * code inner
     *
     * @type {string}
     */
    code: string;
};
