/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Text Code
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { CodeTextToken } from "../../../contracts/lexer/token/text/code";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeTextTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class CodeTextTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^(`{1,3})([^`]+)(`{1,3})/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {CodeTextToken}
     */
    protected token(match: RegExpMatchArray): CodeTextToken {
        return {
            type: "text-code",
            text: match[2],
        };
    }
}
