/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Ornament Full Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { FullSpaceOrnamentToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Full Space Ornament Token
 */
type FullSpaceOrnamentToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "full-space";
};
