/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Ornament Tab
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { TabOrnamentTreeItem } from "../../../contracts/parser/treeItem/child/ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { TabOrnamentGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Tab Ornament Generator
 */
class TabOrnamentGenerator extends BaseGenerator {
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
        return treeItem.type === "tab";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {TabOrnamentTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: TabOrnamentTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;";

        element.classList.add("tab");

        return element;
    }
}
