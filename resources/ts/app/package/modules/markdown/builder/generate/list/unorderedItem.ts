/*****************************************
 * Package Module Markdown Builder
 *
 * Generate List Unordered Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { UnorderedListItemTreeItem } from "../../../contracts/parser/treeItem/list/unorderedItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { UnorderedListItemGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Unordered Item List Generator
 */
class UnorderedListItemGenerator extends BaseGenerator {
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
        return treeItem.type === "list-item-unordered";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {UnorderedListItemTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: UnorderedListItemTreeItem): HTMLElement {
        const element = document.createElement("li");

        element.classList.add("list-item");
        element.classList.add("list-item__unordered");

        return element;
    }
}
