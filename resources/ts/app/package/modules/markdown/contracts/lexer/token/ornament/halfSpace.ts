/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Ornament Half Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { HalfSpaceOrnamentToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Half Space Ornament Token
 */
type HalfSpaceOrnamentToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "half-space";
};
