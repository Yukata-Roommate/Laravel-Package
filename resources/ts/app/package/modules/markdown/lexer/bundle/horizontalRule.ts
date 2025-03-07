/*****************************************
 * Package Module Markdown Lexer
 *
 * Bundle Horizontal Rule
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseBundler } from "./base";

import type { HorizontalRuleBundle } from "../../contracts/lexer/bundle/horizontalRule";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HorizontalRuleBundler };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Horizontal Rule Bundler
 */
class HorizontalRuleBundler extends BaseBundler {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * regex pattern
     *
     * @type {RegExp}
     */
    protected readonly pattern: RegExp = /^(\*{3,}|-{3,}|_{3,})$/;

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * bundle markdown text
     *
     * @param {string} row
     * @return {HorizontalRuleBundle}
     */
    bundle(row: string): HorizontalRuleBundle {
        return {
            type: "horizontal-rule",
        };
    }
}
