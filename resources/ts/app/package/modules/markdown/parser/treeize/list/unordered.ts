/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize List Unordered
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _ListTreeizer } from "../base";

import type { UnorderedListTreeItem } from "../../../contracts/parser/treeItem/list/unordered";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { UnorderedListTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown List Unordered Treeizer
 */
class UnorderedListTreeizer extends _ListTreeizer {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * make tree item
     *
     * @return {UnorderedListTreeItem}
     */
    make(): UnorderedListTreeItem {
        return {
            type: "list-unordered",
            children: [],
        };
    }
}
