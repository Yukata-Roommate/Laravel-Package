/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Text Strike
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { StrikeTextTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Strike Text Tree Item
 */
type StrikeTextTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "text-strike";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
