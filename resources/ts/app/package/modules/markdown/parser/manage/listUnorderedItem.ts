/*****************************************
 * Package Module Markdown Parser
 *
 * Manage List Unordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { ListManager } from "./base";

import { UnorderedListTreeizer } from "../treeize/list/unordered";
import { UnorderedListItemTreeizer } from "../treeize/list/unorderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { UnorderedListItemManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown List Unordered Item Manager
 */
class UnorderedListItemManager extends ListManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {UnorderedListItemTreeizer}
     */
    protected treeizer: UnorderedListItemTreeizer =
        new UnorderedListItemTreeizer();

    /**
     * parent treeizer
     *
     * @type {UnorderedListTreeizer}
     */
    protected parent: UnorderedListTreeizer = new UnorderedListTreeizer();
}
