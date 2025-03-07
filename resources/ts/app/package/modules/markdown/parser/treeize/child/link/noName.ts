/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Link No Name
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { NoNameLinkTreeItem } from "../../../../contracts/parser/treeItem/child/link/noName";

import type { Token } from "../../../../contracts/lexer/token";
import type { NoNameLinkToken } from "../../../../contracts/lexer/token/link/noName";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NoNameLinkTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class NoNameLinkTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is NoNameLinkToken}
     */
    match(token: Token): token is NoNameLinkToken {
        return token.type === "link-no-name";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {NoNameLinkToken} token
     * @return {TreeItem}
     */
    treeize(token: NoNameLinkToken): NoNameLinkTreeItem {
        return {
            type: "link-no-name",
            link: token.link,
        };
    }
}
