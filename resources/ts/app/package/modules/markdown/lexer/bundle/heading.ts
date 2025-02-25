/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Heading
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { TokenizeBundler } from "./base";

import type { HeadingBundle } from "../../contracts/lexer/bundle/heading";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HeadingBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Heading Bundler
 */
class HeadingBundler extends TokenizeBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^#{1,6} \S.*$/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * trimming pattern
     *
     * @type {RegExp}
     */
    protected readonly trimPattern: RegExp = /^#{1,6} /;

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {HeadingBundle}
     */
    bundle(row: string): HeadingBundle {
        return {
            type: "heading",
            tokens: this.tokenize(row),
            level: this.countSharp(row),
        };
    }
}
