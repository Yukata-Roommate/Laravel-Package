/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item List Unordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParentTreeItem } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { UnorderedListItemTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Unordered List Item Tree Item
 */
type UnorderedListItemTreeItem = ParentTreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "list-item-unordered";
};
