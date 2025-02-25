/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Ornament Tab
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { TabOrnamentTreeItem } from "../../../../contracts/parser/treeItem/child/ornament/tab";

import type { Token } from "../../../../contracts/lexer/token";
import type { TabOrnamentToken } from "../../../../contracts/lexer/token/ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { TabOrnamentTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class TabOrnamentTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is TabOrnamentToken}
     */
    match(token: Token): token is TabOrnamentToken {
        return token.type === "tab";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {TabOrnamentToken} token
     * @return {TreeItem}
     */
    treeize(token: TabOrnamentToken): TabOrnamentTreeItem {
        return {
            type: "tab",
        };
    }
}
