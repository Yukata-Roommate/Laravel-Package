/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle Heading
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TokenBundle } from "./base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { HeadingBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Heading Bundle
 */
type HeadingBundle = TokenBundle & {
    /**
     * bundle type
     *
     * @type {string}
     */
    type: "heading";

    /**
     * heading level
     *
     * @type {number}
     */
    level: number;
};
