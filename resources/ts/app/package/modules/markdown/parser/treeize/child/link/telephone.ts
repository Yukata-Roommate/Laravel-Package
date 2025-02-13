/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Link Telephone
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseChildTreeizer } from "../base";

import type { TelephoneLinkTreeItem } from "../../../../contracts/parser/treeItem/child/link/telephone";

import type { Token } from "../../../../contracts/lexer/token";
import type { TelephoneLinkToken } from "../../../../contracts/lexer/token/link/telephone";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { TelephoneLinkTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class TelephoneLinkTreeizer extends BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {token is TelephoneLinkToken}
     */
    match(token: Token): token is TelephoneLinkToken {
        return token.type === "link-telephone";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {TelephoneLinkToken} token
     * @return {TreeItem}
     */
    treeize(token: TelephoneLinkToken): TelephoneLinkTreeItem {
        return {
            type: "link-telephone",
            link: token.link,
        };
    }
}
