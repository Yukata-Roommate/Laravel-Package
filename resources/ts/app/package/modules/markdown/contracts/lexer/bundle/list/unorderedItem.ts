/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle List Unordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TokenBundle } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { UnorderedListItemBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Unordered List Item Bundle
 */
type UnorderedListItemBundle = TokenBundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "list-item-unordered";

    /**
     * indent
     *
     * @type {number}
     */
    indent: number;
};
