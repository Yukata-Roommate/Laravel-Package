/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Code Block
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { BaseGenerator } from "../base";

import type { TreeItem } from "../../../contracts/parser/treeItem";
import type { CodeBlockTreeItem } from "../../../contracts/parser/treeItem/code/block";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export { CodeBlockGenerator };

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown Builder Code Block Generator
 */
class CodeBlockGenerator extends BaseGenerator {
    /*----------------------------------------*
     * Match
     *----------------------------------------*/

    /**
     * whether match type enum
     *
     * @param {TreeItem} treeItem
     * @return {boolean}
     */
    match(treeItem: TreeItem): boolean {
        return treeItem.type === "code-block";
    }

    /*----------------------------------------*
     * Generate
     *----------------------------------------*/

    /**
     * generate markdown html element
     *
     * @param {CodeBlockTreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: CodeBlockTreeItem): HTMLElement {
        const element = document.createElement("div");

        element.classList.add("code-block-container");

        element.appendChild(this.generatePre(treeItem));

        element.appendChild(this.generateCopyButton(treeItem));

        if (treeItem.language) {
            element.appendChild(this.generateLanguage(treeItem));
        }

        return element;
    }

    /**
     * generate code block pre
     *
     * @param {CodeBlockTreeItem} treeItem
     * @return {HTMLPreElement}
     */
    private generatePre(treeItem: CodeBlockTreeItem): HTMLPreElement {
        const pre = document.createElement("pre");

        pre.classList.add("code-block");

        pre.appendChild(this.generateCode(treeItem));

        return pre;
    }

    /**
     * generate code block code
     *
     * @param {CodeBlockTreeItem} treeItem
     * @return {HTMLElement}
     */
    private generateCode(treeItem: CodeBlockTreeItem): HTMLElement {
        const code = document.createElement("code");

        code.classList.add("code-block-inner");

        code.innerHTML = treeItem.code.trim();

        return code;
    }

    /**
     * generate code block copy button
     *
     * @param {CodeBlockTreeItem} treeItem
     * @return {HTMLButtonElement}
     */
    private generateCopyButton(treeItem: CodeBlockTreeItem): HTMLButtonElement {
        const button = document.createElement("button");

        button.classList.add("code-block__copy-button");

        button.innerHTML = "Copy";

        return button;
    }

    /**
     * generate code block language
     *
     * @param {CodeBlockTreeItem} treeItem
     * @return {HTMLSpanElement}
     */
    private generateLanguage(treeItem: CodeBlockTreeItem): HTMLSpanElement {
        const language = document.createElement("span");

        language.classList.add("code-block-language");

        language.innerHTML = treeItem.language;

        return language;
    }
}
