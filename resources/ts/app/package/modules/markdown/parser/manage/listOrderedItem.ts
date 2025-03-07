/*****************************************
 * Package Module Markdown Parser
 *
 * Manage List Ordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { ListManager } from "./base";

import { OrderedListTreeizer } from "../treeize/list/ordered";
import { OrderedListItemTreeizer } from "../treeize/list/orderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { OrderedListItemManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown List Ordered Item Manager
 */
class OrderedListItemManager extends ListManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {OrderedListItemTreeizer}
     */
    protected treeizer: OrderedListItemTreeizer = new OrderedListItemTreeizer();

    /**
     * parent treeizer
     *
     * @type {OrderedListTreeizer}
     */
    protected parent: OrderedListTreeizer = new OrderedListTreeizer();
}
