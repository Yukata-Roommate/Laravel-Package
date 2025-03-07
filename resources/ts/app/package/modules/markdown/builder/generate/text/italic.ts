/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Text Italic
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { ItalicTextTreeItem } from "../../../contracts/parser/treeItem/child/text/italic";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ItalicTextGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Italic Text Generator
 */
class ItalicTextGenerator extends BaseGenerator {
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
        return treeItem.type === "text-italic";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {ItalicTextTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: ItalicTextTreeItem): HTMLElement {
        const element = document.createElement("span");

        element.innerHTML = treeItem.text;

        element.classList.add("text");
        element.classList.add("text__italic");

        return element;
    }
}
