/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Text Italic
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { ItalicTextToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Italic Text Token
 */
type ItalicTextToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "text-italic";

    /**
     * token text
     *
     * @type {string}
     */
    text: string;
};
