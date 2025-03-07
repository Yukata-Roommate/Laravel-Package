/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize List Ordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _ParentTreeizer } from "../base";

import type { OrderedListItemTreeItem } from "../../../contracts/parser/treeItem/list/orderedItem";

import type { Bundle } from "../../../contracts/lexer/bundle";
import type { OrderedListItemBundle } from "../../../contracts/lexer/bundle/list/orderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { OrderedListItemTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown List Ordered Item Treeizer
 */
class OrderedListItemTreeizer extends _ParentTreeizer {
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
        return bundle.type === "list-item-ordered";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {OrderedListItemBundle} bundle
     * @return {OrderedListItemTreeItem}
     */
    treeize(bundle: OrderedListItemBundle): OrderedListItemTreeItem {
        return {
            type: "list-item-ordered",
            children: this.children(bundle),
        };
    }
}
