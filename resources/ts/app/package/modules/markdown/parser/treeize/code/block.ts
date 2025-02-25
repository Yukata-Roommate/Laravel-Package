/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Code Block
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { _Treeizer } from "../base";

import type { CodeBlockTreeItem } from "../../../contracts/parser/treeItem/code/block";

import type { Bundle } from "../../../contracts/lexer/bundle";
import type { CodeBlockBundle } from "../../../contracts/lexer/bundle/code/block";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeBlockTreeizer };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Code Block Treeizer
 */
class CodeBlockTreeizer extends _Treeizer {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match bundle
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    match(bundle: Bundle): boolean {
        return bundle.type === "code-block";
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize markdown tokens
     *
     * @param {CodeBlockBundle} bundle
     * @return {CodeBlockTreeItem}
     */
    treeize(bundle: CodeBlockBundle): CodeBlockTreeItem {
        return {
            type: "code-block",
            language: bundle.language,
            code: "",
        };
    }
}
