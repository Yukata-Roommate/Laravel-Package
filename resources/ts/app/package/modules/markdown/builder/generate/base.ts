/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem } from "../../contracts/parser/treeItem";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BaseGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Generator
 */
abstract class BaseGenerator {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match type enum
     *
     * @param {TreeItem} treeItem
     * @return {boolean}
     */
    abstract match(treeItem: TreeItem): boolean;

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {TreeItem} treeItem
     * @return {HTMLElement}
     */
    abstract generate(treeItem: TreeItem): HTMLElement;
}
