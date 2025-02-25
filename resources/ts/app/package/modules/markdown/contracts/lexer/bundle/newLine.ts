/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle New Line
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Bundle } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { NewLineBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown New Line Bundle
 */
type NewLineBundle = _Bundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "new-line";
};
