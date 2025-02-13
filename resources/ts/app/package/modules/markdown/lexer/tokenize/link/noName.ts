/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Link No Name
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { NoNameLinkToken } from "../../../contracts/lexer/token/link/noName";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NoNameLinkTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class NoNameLinkTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp =
        /^(?<![\[\(])(?:http|https):\/\/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {NoNameLinkToken}
     */
    protected token(match: RegExpMatchArray): NoNameLinkToken {
        return {
            type: "link-no-name",
            link: match[0],
        };
    }
}
