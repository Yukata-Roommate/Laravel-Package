/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize New Line
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _Treeizer } from "./base";

import type { NewLineTreeItem } from "../../contracts/parser/treeItem/newLine";

import type { Bundle } from "../../contracts/lexer/bundle";
import type { NewLineBundle } from "../../contracts/lexer/bundle/newLine";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NewLineTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown New Line Treeizer
 */
class NewLineTreeizer extends _Treeizer {
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
        return bundle.type === "new-line";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {NewLineBundle} bundle
     * @return {NewLineTreeItem}
     */
    treeize(bundle: NewLineBundle): NewLineTreeItem {
        return {
            type: "new-line",
        };
    }
}
