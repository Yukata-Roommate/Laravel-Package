/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Text Strike
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { StrikeTextTreeItem } from "../../../../contracts/parser/treeItem/child/text/strike";

import type { Token } from "../../../../contracts/lexer/token";
import type { StrikeTextToken } from "../../../../contracts/lexer/token/text/strike";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { StrikeTextTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class StrikeTextTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is StrikeTextToken}
     */
    match(token: Token): token is StrikeTextToken {
        return token.type === "text-strike";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {StrikeTextToken} token
     * @return {TreeItem}
     */
    treeize(token: StrikeTextToken): StrikeTextTreeItem {
        return {
            type: "text-strike",
            text: token.text,
        };
    }
}
