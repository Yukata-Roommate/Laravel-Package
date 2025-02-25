/*****************************************
 * Package Module Markdown Parser
 *
 * Manage Heading
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { SimpleManager } from "./base";

import { HeadingTreeizer } from "../treeize/heading";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { HeadingManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Heading Manager
 */
class HeadingManager extends SimpleManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {HeadingTreeizer}
     */
    protected treeizer: HeadingTreeizer = new HeadingTreeizer();
}
