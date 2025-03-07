/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Paragraph
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { TokenizeBundler } from "./base";

import type { ParagraphBundle } from "../../contracts/lexer/bundle/paragraph";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ParagraphBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Paragraph Bundler
 */
class ParagraphBundler extends TokenizeBundler {
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
     * trimming pattern
     *
     * @type {RegExp}
     */
    protected readonly trimPattern: RegExp = /^$/;

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {ParagraphBundle}
     */
    bundle(row: string): ParagraphBundle {
        return {
            type: "paragraph",
            tokens: this.tokenize(row),
        };
    }
}
