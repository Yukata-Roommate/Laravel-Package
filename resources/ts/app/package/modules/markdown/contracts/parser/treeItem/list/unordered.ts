/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item List Unordered
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParentTreeItem } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { UnorderedListTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Unordered List Tree Item
 */
type UnorderedListTreeItem = ParentTreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "list-unordered";
};
