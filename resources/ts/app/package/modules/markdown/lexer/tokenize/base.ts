/*****************************************
 * Package Module Markdown
 *
 * Lexer Tokenize Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { Token } from "../../contracts/lexer/token";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BaseTokenizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

abstract class BaseTokenizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected abstract readonly pattern: RegExp;

    /**
     * match regex
     *
     * @param {string} row
     * @return {RegExpMatchArray | null}
     */
    private matchRegex(row: string): RegExpMatchArray | null {
        return row.match(this.pattern);
    }

    /**
     * match regex strict
     *
     * @param {string} row
     * @return {RegExpMatchArray}
     */
    protected matchRegexStrict(row: string): RegExpMatchArray {
        const match = this.matchRegex(row);

        if (match === null) throw new Error("Invalid match");

        return match;
    }

    /**
     * whether match regex
     *
     * @param {string} row
     * @return {boolean}
     */
    match(row: string): boolean {
        return this.matchRegex(row) !== null;
    }

    /*----------------------------------------*
     * Tokenize
     *----------------------------------------*/

    /**
     * tokenize markdown text
     *
     * @param {string} row
     * @return {Token}
     */
    tokenize(row: string): Token {
        const match = this.matchRegexStrict(row);

        return this.token(match);
    }

    /**
     * make token from match
     *
     * @param {RegExpMatchArray} match
     * @return {Token}
     */
    protected abstract token(match: RegExpMatchArray): Token;

    /**
     * get token position
     *
     * @param {string} row
     * @param {number} position
     * @return {number}
     */
    position(row: string, position: number): number {
        const match = this.matchRegexStrict(row);

        return match[0].length + position;
    }
}
