/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Heading
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "./base";

import type { TreeItem } from "../../contracts/parser/treeItem";
import type { HeadingTreeItem } from "../../contracts/parser/treeItem/heading";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HeadingGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Heading Generator
 */
class HeadingGenerator extends BaseGenerator {
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
        return treeItem.type === "heading";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {HeadingTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: HeadingTreeItem): HTMLElement {
        const element = document.createElement(`h${treeItem.level}`);

        element.classList.add("heading");
        element.classList.add(`heading__${treeItem.level}`);

        return element;
    }
}
