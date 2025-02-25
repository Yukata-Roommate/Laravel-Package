/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Text Normal
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { NormalTextToken } from "../../../contracts/lexer/token/text/normal";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NormalTextTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class NormalTextTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp =
        /(?:(?!\*\*|\*|~~|\[|https?:\/\/|0(?:\d{1}-\d{4}-\d{4}|\d{2}-\d{3}-\d{4}|\d{2}-\d{4}-\d{3,4}|\d{3}-\d{2}-\d{4}|\d{3}-\d{3}-\d{3}|\d{4}-\d{1}-\d{4})).)+?(?=\*\*|\*|~~|\[|https?:\/\/|0(?:\d{1}-\d{4}-\d{4}|\d{2}-\d{3}-\d{4}|\d{2}-\d{4}-\d{3,4}|\d{3}-\d{2}-\d{4}|\d{3}-\d{3}-\d{3}|\d{4}-\d{1}-\d{4})|$)/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {NormalTextToken}
     */
    protected token(match: RegExpMatchArray): NormalTextToken {
        return {
            type: "text-normal",
            text: match[0],
        };
    }
}
