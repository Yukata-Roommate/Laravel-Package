/*****************************************
 * Package Module Markdown Parser
 *
 * Manage Horizontal Rule
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { SimpleManager } from "./base";

import { HorizontalRuleTreeizer } from "../treeize/horizontalRule";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HorizontalRuleManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Horizontal Rule Manager
 */
class HorizontalRuleManager extends SimpleManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {HorizontalRuleTreeizer}
     */
    protected treeizer: HorizontalRuleTreeizer = new HorizontalRuleTreeizer();
}
