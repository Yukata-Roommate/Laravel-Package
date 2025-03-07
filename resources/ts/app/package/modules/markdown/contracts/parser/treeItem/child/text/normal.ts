/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Text Normal
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NormalTextTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Normal Text Tree Item
 */
type NormalTextTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "text-normal";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
