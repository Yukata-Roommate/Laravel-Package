/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { Token } from "../token";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { _Bundle, TokenBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Bundle
 */
type _Bundle = {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: string;
};

/**
 * Markdown Token Bundle
 */
type TokenBundle = _Bundle & {
    /**
     * tokens
     *
     * @type {Token[]}
     */
    tokens: Token[];
};
