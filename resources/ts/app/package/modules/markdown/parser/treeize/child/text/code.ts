/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Text Code
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { CodeTextTreeItem } from "../../../../contracts/parser/treeItem/child/text/code";

import type { Token } from "../../../../contracts/lexer/token";
import type { CodeTextToken } from "../../../../contracts/lexer/token/text/code";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeTextTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class CodeTextTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is CodeTextToken}
     */
    match(token: Token): token is CodeTextToken {
        return token.type === "text-code";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {CodeTextToken} token
     * @return {TreeItem}
     */
    treeize(token: CodeTextToken): CodeTextTreeItem {
        return {
            type: "text-code",
            text: token.text,
        };
    }
}
