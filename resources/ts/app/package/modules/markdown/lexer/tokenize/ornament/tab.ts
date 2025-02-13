/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Ornament Tab
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { TabOrnamentToken } from "../../../contracts/lexer/token/ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { TabOrnamentTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class TabOrnamentTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^(\t| {4})/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {TabOrnamentToken}
     */
    protected token(match: RegExpMatchArray): TabOrnamentToken {
        return {
            type: "tab",
        };
    }
}
