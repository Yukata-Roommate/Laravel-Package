/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Text Italic
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { ItalicTextToken } from "../../../contracts/lexer/token/text/italic";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ItalicTextTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class ItalicTextTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^(\*|_)(?=\S)(.+?)(?<=\S)(\*|_)/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {ItalicTextToken}
     */
    protected token(match: RegExpMatchArray): ItalicTextToken {
        return {
            type: "text-italic",
            text: match[2],
        };
    }
}
