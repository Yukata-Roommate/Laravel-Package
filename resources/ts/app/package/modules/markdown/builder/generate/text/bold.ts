/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Text Bold
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { BoldTextTreeItem } from "../../../contracts/parser/treeItem/child/text/bold";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BoldTextGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Bold Text Generator
 */
class BoldTextGenerator extends BaseGenerator {
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
        return treeItem.type === "text-bold";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {BoldTextTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: BoldTextTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = treeItem.text;

        element.classList.add("text");
        element.classList.add("text__bold");

        return element;
    }
}
