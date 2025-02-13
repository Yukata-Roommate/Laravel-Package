/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Paragraph
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "./base";

import type { TreeItem } from "../../contracts/parser/treeItem";
import type { ParagraphTreeItem } from "../../contracts/parser/treeItem/paragraph";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ParagraphGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Paragraph Generator
 */
class ParagraphGenerator extends BaseGenerator {
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
        return treeItem.type === "paragraph";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {ParagraphTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: ParagraphTreeItem): HTMLElement {
        const element = document.createElement("p");

        element.classList.add("paragraph");

        return element;
    }
}
