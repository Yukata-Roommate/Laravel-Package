/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle Horizontal Rule
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { _Bundle } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { HorizontalRuleBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Horizontal Rule Bundle
 */
type HorizontalRuleBundle = _Bundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "horizontal-rule";
};
