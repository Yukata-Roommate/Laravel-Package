/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle Code Inner
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Bundle } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { CodeInnerBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Code Inner Bundle
 */
type CodeInnerBundle = _Bundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "code-inner";

    /**
     * inner text
     *
     * @type {string}
     */
    text: string;
};
