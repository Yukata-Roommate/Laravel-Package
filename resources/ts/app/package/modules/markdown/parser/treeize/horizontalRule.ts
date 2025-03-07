/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Horizontal Rule
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _Treeizer } from "./base";

import type { HorizontalRuleTreeItem } from "../../contracts/parser/treeItem/horizontalRule";

import type { Bundle } from "../../contracts/lexer/bundle";
import type { HorizontalRuleBundle } from "../../contracts/lexer/bundle/horizontalRule";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HorizontalRuleTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Horizontal Rule Treeizer
 */
class HorizontalRuleTreeizer extends _Treeizer {
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
        return bundle.type === "horizontal-rule";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {HorizontalRuleBundle} bundle
     * @return {HorizontalRuleTreeItem}
     */
    treeize(bundle: HorizontalRuleBundle): HorizontalRuleTreeItem {
        return {
            type: "horizontal-rule",
        };
    }
}
