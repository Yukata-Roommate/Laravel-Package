/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle New Line
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseBundler } from "./base";

import type { NewLineBundle } from "../../contracts/lexer/bundle/newLine";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NewLineBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown New Line Bundler
 */
class NewLineBundler extends BaseBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^$/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {NewLineBundle}
     */
    bundle(row: string): NewLineBundle {
        return {
            type: "new-line",
        };
    }
}
