/*****************************************
 * Package Module Markdown Parser
 *
 * Manage Code Block
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseManager } from "./base";

import type { CodeBlockTreeItem } from "../../contracts/parser/treeItem/code/block";

import type { Bundle } from "../../contracts/lexer/bundle";
import type { CodeBlockBundle } from "../../contracts/lexer/bundle/code/block";
import type { CodeInnerBundle } from "../../contracts/lexer/bundle/code/inner";

import { CodeBlockTreeizer } from "../treeize/code/block";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeBlockManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Code Block Manager
 */
class CodeBlockManager extends BaseManager {
    /*----------------------------------------*
     * Init
     *----------------------------------------*/

    /**
     * init
     *
     * @return {void}
     */
    init(): void {
        this.treeItem = null;
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {CodeBlockTreeizer}
     */
    protected treeizer: CodeBlockTreeizer = new CodeBlockTreeizer();

    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token bundle enum
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    override match(bundle: Bundle): boolean {
        return super.match(bundle) || bundle.type === "code-inner";
    }

    /*----------------------------------------*
     * Tree
     *----------------------------------------*/

    /**
     * tree item
     *
     * @type {CodeBlockTreeItem | null}
     */
    protected treeItem: CodeBlockTreeItem | null = null;

    /**
     * get tree item
     *
     * @return {CodeBlockTreeItem | null}
     */
    get tree(): CodeBlockTreeItem | null {
        const treeItem = this.treeItem;

        this.init();

        return treeItem;
    }

    /**
     * whether require push
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    isRequirePush(bundle: Bundle): boolean {
        return super.match(bundle) && this.treeItem !== null;
    }

    /*----------------------------------------*
     * Add
     *----------------------------------------*/

    /**
     * add token bundle
     *
     * @param {Bundle} bundle
     * @return {this}
     */
    add(bundle: Bundle): this {
        if (super.match(bundle)) this.addParent(bundle as CodeBlockBundle);
        else this.addChild(bundle as CodeInnerBundle);

        return this;
    }

    /**
     * add parent tree item
     *
     * @param {CodeBlockBundle} bundle
     * @return {void}
     */
    protected addParent(bundle: CodeBlockBundle): void {
        if (this.treeItem !== null)
            throw new Error(
                `Tree item already exists: ${JSON.stringify(bundle)}`
            );

        this.treeItem = this.treeizer.treeize(bundle);
    }

    /**
     * add child tree item
     *
     * @param {CodeInnerBundle} bundle
     * @return {void}
     */
    protected addChild(bundle: CodeInnerBundle): void {
        if (this.treeItem === null)
            throw new Error(
                `Tree item does not exist: ${JSON.stringify(bundle)}`
            );

        this.treeItem.code += `${bundle.text}\n`;
    }
}
