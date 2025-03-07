/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Text Strike
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { StrikeTextToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Strike Text Token
 */
type StrikeTextToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "text-strike";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
