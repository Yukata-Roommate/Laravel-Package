/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Heading
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParentTreeItem } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { HeadingTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Heading Tree Item
 */
type HeadingTreeItem = ParentTreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "heading";

    /**
     * heading level
     *
     * @type {number}
     */
    level: number;
};
