/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Text Code
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { CodeTextTreeItem } from "../../../contracts/parser/treeItem/child/text/code";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeTextGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Code Text Generator
 */
class CodeTextGenerator extends BaseGenerator {
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
        return treeItem.type === "text-code";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {CodeTextTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: CodeTextTreeItem): HTMLElement {
        const element = document.createElement("code");

        element.innerHTML = treeItem.text;

        element.classList.add("text");
        element.classList.add("text__code");

        return element;
    }
}
