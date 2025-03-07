/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Ornament Half Space
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { HalfSpaceOrnamentTreeItem } from "../../../../contracts/parser/treeItem/child/ornament/halfSpace";

import type { Token } from "../../../../contracts/lexer/token";
import type { HalfSpaceOrnamentToken } from "../../../../contracts/lexer/token/ornament/halfSpace";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HalfSpaceOrnamentTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class HalfSpaceOrnamentTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is HalfSpaceOrnamentToken}
     */
    match(token: Token): token is HalfSpaceOrnamentToken {
        return token.type === "half-space";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {HalfSpaceOrnamentToken} token
     * @return {TreeItem}
     */
    treeize(token: HalfSpaceOrnamentToken): HalfSpaceOrnamentTreeItem {
        return {
            type: "half-space",
        };
    }
}
