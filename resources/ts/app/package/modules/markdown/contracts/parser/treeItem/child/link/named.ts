/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Link Named
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NamedLinkTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Named Link Tree Item
 */
type NamedLinkTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "link-named";

    /**
     * link
     *
     * @type {string}
     */
    link: string;

    /**
     * name
     *
     * @type {string}
     */
    name: string;
};
