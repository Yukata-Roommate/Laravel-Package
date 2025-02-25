/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Index
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { Bundle } from "../../contracts/lexer/bundle";

import { BaseBundler } from "./base";

import { ParagraphBundler } from "./paragraph";
import { HeadingBundler } from "./heading";
import { NewLineBundler } from "./newLine";
import { HorizontalRuleBundler } from "./horizontalRule";

import { OrderedListItemBundler } from "./list/orderedItem";
import { UnorderedListItemBundler } from "./list/unorderedItem";

import { CodeBlockBundler } from "./code/block";
import { CodeInnerBundler } from "./code/inner";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Bundler {
    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {Bundle}
     */
    static bundle(row: string): Bundle {
        return bundler.bundle(row);
    }

    /**
     * bundle code inner
     *
     * @param {string} row
     * @return {Bundle}
     */
    static codeInner(row: string): Bundle {
        return bundler.codeInner(row);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _Bundler {
    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {Bundle}
     */
    bundle(row: string): Bundle {
        const bundlers: BaseBundler[] = this.bundlers();

        for (const bundler of bundlers) {
            if (!bundler.match(row)) continue;

            return bundler.bundle(row);
        }

        return new ParagraphBundler().bundle(row);
    }

    /**
     * bundle code inner
     *
     * @param {string} row
     * @return {Bundle}
     */
    codeInner(row: string): Bundle {
        return new CodeInnerBundler().bundle(row);
    }

    /**
     * get bundlers
     *
     * @return {BaseBundler[]}
     */
    private bundlers(): BaseBundler[] {
        return [
            new HeadingBundler(),
            new NewLineBundler(),
            new HorizontalRuleBundler(),

            new OrderedListItemBundler(),
            new UnorderedListItemBundler(),

            new CodeBlockBundler(),
        ];
    }
}

/**
 * Markdown Lexer Bundler
 *
 * @type {_Bundler}
 */
const bundler: _Bundler = new _Bundler();
