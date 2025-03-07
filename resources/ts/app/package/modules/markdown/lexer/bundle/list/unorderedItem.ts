/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle List Unordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { TokenizeBundler } from "../base";

import type { UnorderedListItemBundle } from "../../../contracts/lexer/bundle/list/unorderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { UnorderedListItemBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Unordered List Item Bundler
 */
class UnorderedListItemBundler extends TokenizeBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^[-*+] [^\s].*$/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * trimming pattern
     *
     * @type {RegExp}
     */
    protected readonly trimPattern: RegExp = /^[-*+]\s+/;

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {UnorderedListItemBundle}
     */
    bundle(row: string): UnorderedListItemBundle {
        return {
            type: "list-item-unordered",
            tokens: this.tokenize(row),
            indent: this.countIndent(row),
        };
    }
}
