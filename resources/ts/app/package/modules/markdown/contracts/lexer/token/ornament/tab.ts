/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token Ornament Tab
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Token } from "../base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { TabOrnamentToken };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Tab Ornament Token
 */
type TabOrnamentToken = _Token & {
    /**
     * token type
     *
     * @type {string}
     */
    type: "tab";
};
