/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Text Bold
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { BoldTextToken } from "../../../contracts/lexer/token/text/bold";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BoldTextTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class BoldTextTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp =
        /^(\*\*|__)(?=\S)(.+?)(?<=\S)(\*\*|__)/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {BoldTextToken}
     */
    protected token(match: RegExpMatchArray): BoldTextToken {
        return {
            type: "text-bold",
            text: match[2],
        };
    }
}
