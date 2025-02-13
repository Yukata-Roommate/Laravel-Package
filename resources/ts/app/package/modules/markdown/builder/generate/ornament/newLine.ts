/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Ornament New Line
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { NewLineTreeItem } from "../../../contracts/parser/treeItem/newLine";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NewLineOrnamentGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder New Line Ornament Generator
 */
class NewLineOrnamentGenerator extends BaseGenerator {
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
        return treeItem.type === "new-line";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {NewLineTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: NewLineTreeItem): HTMLElement {
        const element = document.createElement("br");

        element.classList.add("new-line");

        return element;
    }
}
