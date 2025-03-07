/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle Code Block
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Bundle } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { CodeBlockBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Code Block Bundle
 */
type CodeBlockBundle = _Bundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "code-block";

    /**
     * language
     *
     * @type {string}
     */
    language: string;
};
