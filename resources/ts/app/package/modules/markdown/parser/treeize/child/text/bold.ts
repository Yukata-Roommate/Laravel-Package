/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Text Bold
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { BoldTextTreeItem } from "../../../../contracts/parser/treeItem/child/text/bold";

import type { Token } from "../../../../contracts/lexer/token";
import type { BoldTextToken } from "../../../../contracts/lexer/token/text/bold";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BoldTextTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class BoldTextTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is BoldTextToken}
     */
    match(token: Token): token is BoldTextToken {
        return token.type === "text-bold";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {BoldTextToken} token
     * @return {TreeItem}
     */
    treeize(token: BoldTextToken): BoldTextTreeItem {
        return {
            type: "text-bold",
            text: token.text,
        };
    }
}
