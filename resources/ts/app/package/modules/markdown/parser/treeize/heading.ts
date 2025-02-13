/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Heading
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _ParentTreeizer } from "./base";

import type { HeadingTreeItem } from "../../contracts/parser/treeItem/heading";

import type { Bundle } from "../../contracts/lexer/bundle";
import type { HeadingBundle } from "../../contracts/lexer/bundle/heading";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HeadingTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Heading Treeizer
 */
class HeadingTreeizer extends _ParentTreeizer {
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
        return bundle.type === "heading";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {HeadingBundle} bundle
     * @return {HeadingTreeItem}
     */
    treeize(bundle: HeadingBundle): HeadingTreeItem {
        return {
            type: "heading",
            level: bundle.level,
            children: this.children(bundle),
        };
    }
}
