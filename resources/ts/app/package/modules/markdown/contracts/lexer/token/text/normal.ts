/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Text Normal
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NormalTextToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Normal Text Token
 */
type NormalTextToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "text-normal";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
