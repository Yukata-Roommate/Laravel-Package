/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Link Named
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { NamedLinkTreeItem } from "../../../../contracts/parser/treeItem/child/link/named";

import type { Token } from "../../../../contracts/lexer/token";
import type { NamedLinkToken } from "../../../../contracts/lexer/token/link/named";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NamedLinkTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class NamedLinkTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is NamedLinkToken}
     */
    match(token: Token): token is NamedLinkToken {
        return token.type === "link-named";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {NamedLinkToken} token
     * @return {TreeItem}
     */
    treeize(token: NamedLinkToken): NamedLinkTreeItem {
        return {
            type: "link-named",
            link: token.link,
            name: token.name,
        };
    }
}
