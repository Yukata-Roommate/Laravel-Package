/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Link No Name
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { NoNameLinkTreeItem } from "../../../contracts/parser/treeItem/child/link/noName";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NoNameLinkGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder No Name Link Generator
 */
class NoNameLinkGenerator extends BaseGenerator {
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
        return treeItem.type === "link-no-name";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {NoNameLinkTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: NoNameLinkTreeItem): HTMLElement {
        const element = document.createElement("a");

        element.href = treeItem.link;
        element.innerHTML = treeItem.link;

        element.target = "_blank";
        element.rel = "noopener noreferrer";

        element.classList.add("text");
        element.classList.add("text__link");

        return element;
    }
}
