/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Text Code
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { CodeTextToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Code Text Token
 */
type CodeTextToken = _Token & {
    /**
     * token type
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
