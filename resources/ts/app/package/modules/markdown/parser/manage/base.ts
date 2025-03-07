/*****************************************
 * Package Module Markdown Parser
 *
 * Manage Base
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem, ListTreeItem } from "../../contracts/parser/treeItem";

import type { Bundle, ListBundle } from "../../contracts/lexer/bundle";

import type { _Treeizer, _ListTreeizer } from "../treeize/base";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { BaseManager, SimpleManager, ListManager };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Parser Base Manager
 */
abstract class BaseManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeizer
     *
     * @type {_Treeizer}
     */
    protected abstract treeizer: _Treeizer;

    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match token bundle enum
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    match(bundle: Bundle): boolean {
        return this.treeizer.match(bundle);
    }
}

/**
 * Markdown Parser Simple Manager
 */
abstract class SimpleManager extends BaseManager {
    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * treeize token bundle
     *
     * @param {Bundle} bundle
     * @return {TreeItem}
     */
    treeize(bundle: Bundle): TreeItem {
        return this.treeizer.treeize(bundle);
    }
}

/**
 * Markdown Parser List Manager
 */
abstract class ListManager extends BaseManager {
    /*----------------------------------------*
     * Init
     *----------------------------------------*/

    /**
     * init
     *
     * @return {void}
     */
    init(): void {
        this.treeItems = {};
        this.indent = 0;
    }

    /*----------------------------------------*
     * Treeize
     *----------------------------------------*/

    /**
     * parent treeizer
     *
     * @type {_ListTreeizer}
     */
    protected abstract parent: _ListTreeizer;

    /*----------------------------------------*
     * Tree
     *----------------------------------------*/

    /**
     * tree item list
     *
     * @type {[indent:number]: ListTreeItem}
     */
    protected treeItems: { [indent: number]: ListTreeItem } = {};

    /**
     * get tree item
     *
     * @return {ListTreeItem | null}
     */
    get tree(): ListTreeItem | null {
        if (Object.keys(this.treeItems).length === 0) return null;

        this.mergeParent(0);

        const treeItem = this.treeItems[0];

        this.init();

        return treeItem;
    }

    /*----------------------------------------*
     * Add
     *----------------------------------------*/

    /**
     * tree item indent
     *
     * @type {number}
     */
    protected indent: number = 0;

    /**
     * add token bundle
     *
     * @param {ListBundle} bundle
     * @return {this}
     */
    add(bundle: ListBundle): this {
        const indent: number = bundle.indent;

        if (indent >= this.indent) this.addParent(indent);

        if (indent < this.indent) this.mergeParent(indent);

        this.addChild(bundle, indent);

        this.indent = indent;

        return this;
    }

    /**
     * add parent tree item
     *
     * @param {number} indent
     * @return {void}
     */
    protected addParent(indent: number): void {
        for (let i = this.indent; i <= indent; i++) {
            if (this.treeItems[i]) continue;

            this.treeItems[i] = this.parent.make();
        }
    }

    /**
     * merge parent tree item
     *
     * @param {number} indent
     * @return {void}
     */
    protected mergeParent(indent: number): void {
        for (let i = this.indent; i > indent; i--) {
            const targetIndent: number = i - 1;

            this.treeItems[targetIndent].children.push(this.treeItems[i]);

            delete this.treeItems[i];
        }

        this.indent = indent;
    }

    /**
     * add child tree item
     *
     * @param {Bundle} bundle
     * @param {number} indent
     * @return {void}
     */
    protected addChild(bundle: Bundle, indent: number): void {
        this.treeItems[indent].children.push(this.treeizer.treeize(bundle));
    }
}
