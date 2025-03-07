/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Link Named
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NamedLinkToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Named Link Token
 */
type NamedLinkToken = _Token & {
    /**
     * token type
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
