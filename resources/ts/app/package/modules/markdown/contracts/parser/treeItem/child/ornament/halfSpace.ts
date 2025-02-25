/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Ornament Half Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { HalfSpaceOrnamentTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Half Space Ornament Tree Item
 */
type HalfSpaceOrnamentTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "half-space";
};
