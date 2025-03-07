/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Ornament Full Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { FullSpaceOrnamentTreeItem } from "../../../../contracts/parser/treeItem/child/ornament/fullSpace";

import type { Token } from "../../../../contracts/lexer/token";
import type { FullSpaceOrnamentToken } from "../../../../contracts/lexer/token/ornament/fullSpace";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { FullSpaceOrnamentTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class FullSpaceOrnamentTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is FullSpaceOrnamentToken}
     */
    match(token: Token): token is FullSpaceOrnamentToken {
        return token.type === "full-space";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {FullSpaceOrnamentToken} token
     * @return {TreeItem}
     */
    treeize(token: FullSpaceOrnamentToken): FullSpaceOrnamentTreeItem {
        return {
            type: "full-space",
        };
    }
}
