/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize List Unordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _ParentTreeizer } from "../base";

import type { UnorderedListItemTreeItem } from "../../../contracts/parser/treeItem/list/unorderedItem";

import type { Bundle } from "../../../contracts/lexer/bundle";
import type { UnorderedListItemBundle } from "../../../contracts/lexer/bundle/list/unorderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { UnorderedListItemTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown List Unordered Item Treeizer
 */
class UnorderedListItemTreeizer extends _ParentTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match bundle
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    match(bundle: Bundle): boolean {
        return bundle.type === "list-item-unordered";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {UnorderedListItemBundle} bundle
     * @return {UnorderedListItemTreeItem}
     */
    treeize(bundle: UnorderedListItemBundle): UnorderedListItemTreeItem {
        return {
            type: "list-item-unordered",
            children: this.children(bundle),
        };
    }
}
