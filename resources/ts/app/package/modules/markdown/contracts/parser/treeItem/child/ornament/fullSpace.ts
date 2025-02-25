/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Ornament Full Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { FullSpaceOrnamentTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Full Space Ornament Tree Item
 */
type FullSpaceOrnamentTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "full-space";
};
