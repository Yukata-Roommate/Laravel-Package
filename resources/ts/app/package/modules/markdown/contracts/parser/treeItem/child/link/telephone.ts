/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Link Telephone
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { TelephoneLinkTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Telephone Link Tree Item
 */
type TelephoneLinkTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "link-telephone";

    /**
     * link
     *
     * @type {string}
     */
    link: string;
};
