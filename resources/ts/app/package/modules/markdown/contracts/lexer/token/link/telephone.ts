/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Link Telephone
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { TelephoneLinkToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Telephone Link Token
 */
type TelephoneLinkToken = _Token & {
    /**
     * token type
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
