/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Paragraph
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParentTreeItem } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { ParagraphTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Paragraph Tree Item
 */
type ParagraphTreeItem = ParentTreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "paragraph";
};
