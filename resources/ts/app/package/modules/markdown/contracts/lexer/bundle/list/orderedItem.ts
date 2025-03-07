/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle List Ordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TokenBundle } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { OrderedListItemBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Ordered List Item Bundle
 */
type OrderedListItemBundle = TokenBundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "list-item-ordered";

    /**
     * indent
     *
     * @type {number}
     */
    indent: number;
};
