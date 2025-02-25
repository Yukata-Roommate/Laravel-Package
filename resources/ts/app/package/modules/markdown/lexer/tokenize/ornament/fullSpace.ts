/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Ornament Full Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { FullSpaceOrnamentToken } from "../../../contracts/lexer/token/ornament/fullSpace";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { FullSpaceOrnamentTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class FullSpaceOrnamentTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^　/;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {FullSpaceOrnamentToken}
     */
    protected token(match: RegExpMatchArray): FullSpaceOrnamentToken {
        return {
            type: "full-space",
        };
    }
}
