/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle List Ordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { TokenizeBundler } from "../base";

import type { OrderedListItemBundle } from "../../../contracts/lexer/bundle/list/orderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { OrderedListItemBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Ordered List Item Bundler
 */
class OrderedListItemBundler extends TokenizeBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^\d{1,3}\. [^\s].*$/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * trimming pattern
     *
     * @type {RegExp}
     */
    protected readonly trimPattern: RegExp = /^\d{1,3}\.\s+/;

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {OrderedListItemBundle}
     */
    bundle(row: string): OrderedListItemBundle {
        return {
            type: "list-item-ordered",
            tokens: this.tokenize(row),
            indent: this.countIndent(row),
        };
    }
}
