/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Text Normal
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { NormalTextTreeItem } from "../../../../contracts/parser/treeItem/child/text/normal";

import type { Token } from "../../../../contracts/lexer/token";
import type { NormalTextToken } from "../../../../contracts/lexer/token/text/normal";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NormalTextTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class NormalTextTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is NormalTextToken}
     */
    match(token: Token): token is NormalTextToken {
        return token.type === "text-normal";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {NormalTextToken} token
     * @return {TreeItem}
     */
    treeize(token: NormalTextToken): NormalTextTreeItem {
        return {
            type: "text-normal",
            text: token.text,
        };
    }
}
