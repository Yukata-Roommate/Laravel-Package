/*****************************************
 * Package Module Markdown Builder
 *
 * Generate List Ordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { OrderedListItemTreeItem } from "../../../contracts/parser/treeItem/list/orderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { OrderedListItemGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Ordered Item List Generator
 */
class OrderedListItemGenerator extends BaseGenerator {
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
        return treeItem.type === "list-item-ordered";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {OrderedListItemTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: OrderedListItemTreeItem): HTMLElement {
        const element = document.createElement("li");

        element.classList.add("list-item");
        element.classList.add("list-item__ordered");

        return element;
    }
}
