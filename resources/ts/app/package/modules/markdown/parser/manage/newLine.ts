/*****************************************
 * Package Module Markdown Parser
 *
 * Manage New Line
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { SimpleManager } from "./base";

import { NewLineTreeizer } from "../treeize/newLine";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { NewLineManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown New Line Manager
 */
class NewLineManager extends SimpleManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {NewLineTreeizer}
     */
    protected treeizer: NewLineTreeizer = new NewLineTreeizer();
}
