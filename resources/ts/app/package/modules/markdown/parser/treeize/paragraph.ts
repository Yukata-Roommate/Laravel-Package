/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Paragraph
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _ParentTreeizer } from "./base";

import type { ParagraphTreeItem } from "../../contracts/parser/treeItem/paragraph";

import type { Bundle } from "../../contracts/lexer/bundle";
import type { ParagraphBundle } from "../../contracts/lexer/bundle/paragraph";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ParagraphTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Paragraph Treeizer
 */
class ParagraphTreeizer extends _ParentTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match bundle
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    match(bundle: Bundle): boolean {
        return bundle.type === "paragraph";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {ParagraphBundle} bundle
     * @return {ParagraphTreeItem}
     */
    treeize(bundle: ParagraphBundle): ParagraphTreeItem {
        return {
            type: "paragraph",
            children: this.children(bundle),
        };
    }
}
