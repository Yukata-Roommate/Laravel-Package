/*****************************************
 * Package Module Markdown Builder
 *
 * Generate List Unordered
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { UnorderedListTreeItem } from "../../../contracts/parser/treeItem/list/unordered";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { UnorderedListGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Unordered List Generator
 */
class UnorderedListGenerator extends BaseGenerator {
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
        return treeItem.type === "list-unordered";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {UnorderedListTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: UnorderedListTreeItem): HTMLElement {
        const element = document.createElement("ul");

        element.classList.add("list");
        element.classList.add("list__unordered");

        return element;
    }
}
