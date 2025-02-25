/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle Paragraph
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TokenBundle } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { ParagraphBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Paragraph Bundle
 */
type ParagraphBundle = TokenBundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "paragraph";
};
