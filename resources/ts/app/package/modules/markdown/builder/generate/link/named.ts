/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Link Named
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { NamedLinkTreeItem } from "../../../contracts/parser/treeItem/child/link/named";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NamedLinkGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Named Link Generator
 */
class NamedLinkGenerator extends BaseGenerator {
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
        return treeItem.type === "link-named";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {NamedLinkTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: NamedLinkTreeItem): HTMLElement {
        const element = document.createElement("a");

        element.href = treeItem.link;
        element.innerHTML = treeItem.name;

        element.target = "_blank";
        element.rel = "noopener noreferrer";

        element.classList.add("text");
        element.classList.add("text__link");

        return element;
    }
}
