/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Link Named
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { NamedLinkToken } from "../../../contracts/lexer/token/link/named";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NamedLinkTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class NamedLinkTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^\[([^\]]+)\]\(([^)]+)\)/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {NamedLinkToken}
     */
    protected token(match: RegExpMatchArray): NamedLinkToken {
        return {
            type: "link-named",
            link: match[2],
            name: match[1],
        };
    }
}
