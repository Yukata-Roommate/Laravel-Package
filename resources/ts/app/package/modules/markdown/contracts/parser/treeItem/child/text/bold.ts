/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Text Bold
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { BoldTextTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Bold Text Tree Item
 */
type BoldTextTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "text-bold";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
