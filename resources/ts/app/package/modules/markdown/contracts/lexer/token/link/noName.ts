/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Link No Name
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NoNameLinkToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown NoName Link Token
 */
type NoNameLinkToken = _Token & {
    /**
     * token type
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
