/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Link Telephone
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { TelephoneLinkTreeItem } from "../../../contracts/parser/treeItem/child/link/telephone";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { TelephoneLinkGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Telephone Link Generator
 */
class TelephoneLinkGenerator extends BaseGenerator {
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
        return treeItem.type === "link-telephone";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {TelephoneLinkTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: TelephoneLinkTreeItem): HTMLElement {
        const element = document.createElement("a");

        element.href = `tel:${treeItem.link}`;
        element.innerHTML = treeItem.link;

        element.target = "_blank";
        element.rel = "noopener noreferrer";

        element.classList.add("text");
        element.classList.add("text__link");

        return element;
    }
}
