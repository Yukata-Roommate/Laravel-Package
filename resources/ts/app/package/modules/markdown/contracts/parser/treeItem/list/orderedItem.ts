/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item List Ordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParentTreeItem } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { OrderedListItemTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Ordered List Item Tree Item
 */
type OrderedListItemTreeItem = ParentTreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "list-item-ordered";
};
