/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem } from "../../../contracts/parser/treeItem";

import type { Token } from "../../../contracts/lexer/token";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BaseChildTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

abstract class BaseChildTreeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token
     *
     * @param {Token} token
     * @return {boolean}
     */
    abstract match(token: Token): boolean;

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown token
     *
     * @param {Token} token
     * @return {TreeItem}
     */
    abstract treeize(token: Token): TreeItem;
}
