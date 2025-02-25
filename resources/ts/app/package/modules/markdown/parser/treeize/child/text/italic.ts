/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Text Italic
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { ItalicTextTreeItem } from "../../../../contracts/parser/treeItem/child/text/italic";

import type { Token } from "../../../../contracts/lexer/token";
import type { ItalicTextToken } from "../../../../contracts/lexer/token/text/italic";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ItalicTextTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class ItalicTextTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is ItalicTextToken}
     */
    match(token: Token): token is ItalicTextToken {
        return token.type === "text-italic";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {ItalicTextToken} token
     * @return {TreeItem}
     */
    treeize(token: ItalicTextToken): ItalicTextTreeItem {
        return {
            type: "text-italic",
            text: token.text,
        };
    }
}
