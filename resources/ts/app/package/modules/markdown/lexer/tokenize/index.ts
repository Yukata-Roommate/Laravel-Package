/*****************************************
 * Package Module Markdown Lexer
 *
 * Tokenize Index
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { Token } from "../../contracts/lexer/token";

import { BaseTokenizer } from "./base";

import { BoldTextTokenizer } from "./text/bold";
import { CodeTextTokenizer } from "./text/code";
import { ItalicTextTokenizer } from "./text/italic";
import { NormalTextTokenizer } from "./text/normal";
import { StrikeTextTokenizer } from "./text/strike";

import { NamedLinkTokenizer } from "./link/named";
import { NoNameLinkTokenizer } from "./link/noName";
import { TelephoneLinkTokenizer } from "./link/telephone";

import { FullSpaceOrnamentTokenizer } from "./ornament/fullSpace";
import { HalfSpaceOrnamentTokenizer } from "./ornament/halfSpace";
import { TabOrnamentTokenizer } from "./ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Tokenizer {
    /**
     * tokenize markdown text
     *
     * @param {string} row
     * @param {RegExp} pattern
     * @return {Token[]}
     */
    static tokenize(row: string, pattern: RegExp): Token[] {
        return tokenizer.tokenize(row, pattern);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _Tokenizer {
    /**
     * tokenize markdown text
     *
     * @param {string} row
     * @param {RegExp} pattern
     * @return {Token[]}
     */
    tokenize(row: string, pattern: RegExp): Token[] {
        let tokens: Token[] = [];
        let position: number = 0;
        let isContinue: boolean = false;

        const tokenizers: BaseTokenizer[] = this.tokenizers();

        const trimmed: string = row.trim().replace(pattern, "").trim();

        while (position < trimmed.length) {
            const sliced: string = trimmed.slice(position);

            isContinue = false;

            for (const tokenizer of tokenizers) {
                if (!tokenizer.match(sliced)) continue;

                tokens.push(tokenizer.tokenize(sliced));

                position = tokenizer.position(sliced, position);

                isContinue = true;

                break;
            }

            if (isContinue) continue;

            const tokenizer = new NormalTextTokenizer();

            tokens.push(tokenizer.tokenize(sliced));

            position = tokenizer.position(sliced, position);
        }

        return tokens;
    }

    /**
     * get tokenizers
     *
     * @return {BaseTokenizer[]}
     */
    private tokenizers(): BaseTokenizer[] {
        return [
            new BoldTextTokenizer(),
            new CodeTextTokenizer(),
            new ItalicTextTokenizer(),
            new StrikeTextTokenizer(),

            new NamedLinkTokenizer(),
            new NoNameLinkTokenizer(),
            new TelephoneLinkTokenizer(),

            new FullSpaceOrnamentTokenizer(),
            new HalfSpaceOrnamentTokenizer(),
            new TabOrnamentTokenizer(),
        ];
    }
}

/**
 * Markdown Lexer Tokenizer
 *
 * @type {_Tokenizer}
 */
const tokenizer: _Tokenizer = new _Tokenizer();
