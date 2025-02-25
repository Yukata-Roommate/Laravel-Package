/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { Bundle } from "../../contracts/lexer/bundle";
import type { Token } from "../../contracts/lexer/token";

import { Tokenizer } from "../tokenize";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BaseBundler, TokenizeBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

abstract class BaseBundler {
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
     * whether match regex
     *
     * @param {string} row
     * @return {boolean}
     */
    match(row: string): boolean {
        return this.pattern.test(row.trim());
    }

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {Bundle}
     */
    abstract bundle(row: string): Bundle;

    /*----------------------------------------*
     * Bundle: Count
     *----------------------------------------*/

    /**
     * count indent
     *
     * @param {string} row
     * @return {number}
     */
    protected countIndent(row: string): number {
        let tabCount: number = 0;
        let spaceCount: number = 0;

        for (let character of row) {
            if (character === "\t") {
                tabCount++;

                spaceCount = 0;
            } else if (character === " ") {
                spaceCount++;

                if (spaceCount === 4) {
                    tabCount++;

                    spaceCount = 0;
                }
            } else break;
        }

        return tabCount;
    }

    /**
     * count sharp
     *
     * @param {string} row
     * @return {number}
     */
    protected countSharp(row: string): number {
        let count: number = 0;

        for (let character of row) {
            if (character === "#") count++;
            else break;
        }

        return count;
    }
}

/**
 * Markdown Tokenize Bundler
 */
abstract class TokenizeBundler extends BaseBundler {
    /*----------------------------------------*
     * Bundle: Tokenize
     *----------------------------------------*/

    /**
     * trimming pattern
     *
     * @type {RegExp}
     */
    protected abstract readonly trimPattern: RegExp;

    /**
     * tokenize row
     *
     * @param {string} row
     * @return {Token[]}
     */
    protected tokenize(row: string): Token[] {
        return Tokenizer.tokenize(row, this.trimPattern);
    }
}
