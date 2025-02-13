/*****************************************
 * Package Module Markdown Parser
 *
 * Manage Paragraph
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { SimpleManager } from "./base";

import { ParagraphTreeizer } from "../treeize/paragraph";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { ParagraphManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Paragraph Manager
 */
class ParagraphManager extends SimpleManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {ParagraphTreeizer}
     */
    protected treeizer: ParagraphTreeizer = new ParagraphTreeizer();
}
