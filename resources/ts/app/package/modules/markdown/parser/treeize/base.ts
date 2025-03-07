/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem, ListTreeItem } from "../../contracts/parser/treeItem";

import type { Bundle } from "../../contracts/lexer/bundle";
import type { TokenBundle } from "../../contracts/lexer/bundle/base";

import { ChildTreeizer } from "./child";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { _Treeizer, _ParentTreeizer, _ListTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Parser Treeizer
 */
abstract class _Treeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match bundle
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    abstract match(bundle: Bundle): boolean;

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {Bundle} bundle
     * @return {TreeItem}
     */
    abstract treeize(bundle: Bundle): TreeItem;
}

/**
 * Markdown Parser Parent Treeizer
 */
abstract class _ParentTreeizer extends _Treeizer {
    /*----------------------------------------*
     * Treeize: Children
     *----------------------------------------*/

    /**
     * make children tree items
     *
     * @param {TokenBundle} bundle
     * @return {TreeItem[]}
     */
    protected children(bundle: TokenBundle): TreeItem[] {
        const children: TreeItem[] = [];

        for (const token of bundle.tokens) {
            children.push(ChildTreeizer.treeize(token));
        }

        return children;
    }
}

/**
 * Markdown Parser Simple Treeizer
 */
abstract class _ListTreeizer {
    /**
     * make tree item
     *
     * @return {ListTreeItem}
     */
    abstract make(): ListTreeItem;
}
