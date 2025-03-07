/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Text Normal
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { NormalTextTreeItem } from "../../../contracts/parser/treeItem/child/text/normal";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NormalTextGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Normal Text Generator
 */
class NormalTextGenerator extends BaseGenerator {
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
        return treeItem.type === "text-normal";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {NormalTextTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: NormalTextTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = treeItem.text;

        element.classList.add("text");

        return element;
    }
}
