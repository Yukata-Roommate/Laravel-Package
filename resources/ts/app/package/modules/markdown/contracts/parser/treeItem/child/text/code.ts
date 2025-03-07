/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Text Code
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _TreeItem } from "../../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { CodeTextTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Code Text Tree Item
 */
type CodeTextTreeItem = _TreeItem & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "text-code";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
