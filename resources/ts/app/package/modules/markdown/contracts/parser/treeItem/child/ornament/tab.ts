/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Ornament Tab
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { TabOrnamentTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Tab Ornament Tree Item
 */
type TabOrnamentTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "tab";
};
