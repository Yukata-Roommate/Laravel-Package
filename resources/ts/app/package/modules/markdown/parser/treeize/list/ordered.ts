/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize List Ordered
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _ListTreeizer } from "../base";

import type { OrderedListTreeItem } from "../../../contracts/parser/treeItem/list/ordered";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { OrderedListTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown List Ordered Treeizer
 */
class OrderedListTreeizer extends _ListTreeizer {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * make tree item
     *
     * @return {OrderedListTreeItem}
     */
    make(): OrderedListTreeItem {
        return {
            type: "list-ordered",
            children: [],
        };
    }
}
