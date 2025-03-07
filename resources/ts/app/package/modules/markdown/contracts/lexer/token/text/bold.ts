/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Text Bold
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { BoldTextToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Bold Text Token
 */
type BoldTextToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "text-bold";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
