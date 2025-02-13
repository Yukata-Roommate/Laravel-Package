/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Ornament Full Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { FullSpaceOrnamentTreeItem } from "../../../contracts/parser/treeItem/child/ornament/fullSpace";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { FullSpaceOrnamentGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Full Space Ornament Generator
 */
class FullSpaceOrnamentGenerator extends BaseGenerator {
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
        return treeItem.type === "full-space";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {FullSpaceOrnamentTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: FullSpaceOrnamentTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = "&nbsp;&nbsp;";

        element.classList.add("full-space");

        return element;
    }
}
