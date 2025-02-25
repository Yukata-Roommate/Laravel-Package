/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Text Italic
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { ItalicTextTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Italic Text Tree Item
 */
type ItalicTextTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "text-italic";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
