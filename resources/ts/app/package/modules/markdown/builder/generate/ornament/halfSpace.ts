/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Ornament Half Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { HalfSpaceOrnamentTreeItem } from "../../../contracts/parser/treeItem/child/ornament/halfSpace";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HalfSpaceOrnamentGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Half Space Ornament Generator
 */
class HalfSpaceOrnamentGenerator extends BaseGenerator {
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
        return treeItem.type === "half-space";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {HalfSpaceOrnamentTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: HalfSpaceOrnamentTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = "&nbsp;";

        element.classList.add("half-space");

        return element;
    }
}
