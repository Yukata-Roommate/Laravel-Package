/*****************************************
 * Package Module Markdown
 *
 * Builder
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem } from "./contracts/parser/treeItem";

import { Generator } from "./builder/generate";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Builder {
    /**
     * build html from abstract syntax tree
     *
     * @param {TreeItem[]} tree
     * @return {HTMLElement}
     */
    static build(tree: TreeItem[]): HTMLElement {
        return builder.build(tree);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _Builder {
    /**
     * build html from abstract syntax tree
     *
     * @param {TreeItem[]} tree
     * @return {HTMLElement}
     */
    build(tree: TreeItem[]): HTMLElement {
        const element = document.createElement("div");

        element.classList.add("markdown-container");

        tree.forEach((item) => {
            element.appendChild(Generator.generate(item));
        });

        return element;
    }
}

/**
 * Markdown Builder
 *
 * @type {_Builder}
 */
const builder: _Builder = new _Builder();
