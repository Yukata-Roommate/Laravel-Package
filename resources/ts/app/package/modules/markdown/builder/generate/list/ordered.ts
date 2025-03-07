/*****************************************
 * Package Module Markdown Builder
 *
 * Generate List Ordered
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { OrderedListTreeItem } from "../../../contracts/parser/treeItem/list/ordered";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { OrderedListGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Ordered List Generator
 */
class OrderedListGenerator extends BaseGenerator {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match type enum
     *
     * @param {TreeItem} treeItem
     * @return {boolean}
     */
    match(treeItem: TreeItem): boolean {
        return treeItem.type === "list-ordered";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {OrderedListTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: OrderedListTreeItem): HTMLElement {
        const element = document.createElement("ol");

        element.classList.add("list");
        element.classList.add("list__ordered");

        return element;
    }
}
