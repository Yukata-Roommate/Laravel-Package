/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Ornament Horizontal Rule
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { HorizontalRuleTreeItem } from "../../../contracts/parser/treeItem/horizontalRule";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HorizontalRuleOrnamentGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Horizontal Rule Ornament Generator
 */
class HorizontalRuleOrnamentGenerator extends BaseGenerator {
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
        return treeItem.type === "horizontal-rule";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {HorizontalRuleTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: HorizontalRuleTreeItem): HTMLElement {
        const element = document.createElement("hr");

        element.classList.add("horizontal-rule");

        return element;
    }
}
