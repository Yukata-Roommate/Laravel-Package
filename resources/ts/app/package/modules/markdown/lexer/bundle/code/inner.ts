/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Code Inner
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseBundler } from "../base";

import type { CodeInnerBundle } from "../../../contracts/lexer/bundle/code/inner";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeInnerBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Code Inner Bundler
 */
class CodeInnerBundler extends BaseBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^.*$/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {CodeInnerBundle}
     */
    bundle(row: string): CodeInnerBundle {
        return {
            type: "code-inner",
            text: row,
        };
    }
}
