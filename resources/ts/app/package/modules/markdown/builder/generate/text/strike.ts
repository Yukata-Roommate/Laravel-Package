/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Text Strike
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { StrikeTextTreeItem } from "../../../contracts/parser/treeItem/child/text/strike";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { StrikeTextGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Strike Text Generator
 */
class StrikeTextGenerator extends BaseGenerator {
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
        return treeItem.type === "text-strike";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {StrikeTextTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: StrikeTextTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = treeItem.text;

        element.classList.add("text");
        element.classList.add("text__strike");

        return element;
    }
}
