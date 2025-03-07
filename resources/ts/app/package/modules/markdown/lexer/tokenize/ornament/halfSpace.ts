/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Ornament Half Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseTokenizer } from "../base";

import type { HalfSpaceOrnamentToken } from "../../../contracts/lexer/token/ornament/halfSpace";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HalfSpaceOrnamentTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class HalfSpaceOrnamentTokenizer extends BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^ /;

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {HalfSpaceOrnamentToken}
     */
    protected token(match: RegExpMatchArray): HalfSpaceOrnamentToken {
        return {
            type: "half-space",
        };
    }
}
