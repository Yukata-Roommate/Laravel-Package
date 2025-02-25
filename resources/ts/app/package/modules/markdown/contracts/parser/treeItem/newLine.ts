/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item New Line
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NewLineTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown New Line Tree Item
 */
type NewLineTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "new-line";
};
