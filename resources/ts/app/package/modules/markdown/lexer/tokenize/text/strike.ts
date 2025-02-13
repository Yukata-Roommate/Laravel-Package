/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Text Strike
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { StrikeTextToken } from "../../../contracts/lexer/token/text/strike";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { StrikeTextTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class StrikeTextTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^(\~\~)(?=\S)(.+?)(?<=\S)(\~\~)/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {StrikeTextToken}
     */
    protected token(match: RegExpMatchArray): StrikeTextToken {
        return {
            type: "text-strike",
            text: match[2],
        };
    }
}
