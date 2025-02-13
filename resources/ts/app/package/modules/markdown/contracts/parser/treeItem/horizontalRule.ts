/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Horizontal Rule
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { HorizontalRuleTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Horizontal Rule Tree Item
 */
type HorizontalRuleTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "horizontal-rule";
};
