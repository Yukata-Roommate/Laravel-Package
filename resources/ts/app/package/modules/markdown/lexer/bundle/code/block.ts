/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Code Block
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseBundler } from "../base";

import type { CodeBlockBundle } from "../../../contracts/lexer/bundle/code/block";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeBlockBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Code Block Bundler
 */
class CodeBlockBundler extends BaseBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^```/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {CodeBlockBundle}
     */
    bundle(row: string): CodeBlockBundle {
        return {
            type: "code-block",
            language: this.language(row),
        };
    }

    /**
     * get code language
     *
     * @param {string} row
     * @return {string}
     */
    protected language(row: string): string {
        return row.replace(this.pattern, "").trim();
    }
}
