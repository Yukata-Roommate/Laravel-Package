/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Link No Name
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NoNameLinkTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown No Name Link Tree Item
 */
type NoNameLinkTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "link-no-name";

    /**
     * link
     *
     * @type {string}
     */
    link: string;
};
