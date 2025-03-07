/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item List Ordered
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParentTreeItem } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { OrderedListTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Ordered List Tree Item
 */
type OrderedListTreeItem = ParentTreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "list-ordered";
};
