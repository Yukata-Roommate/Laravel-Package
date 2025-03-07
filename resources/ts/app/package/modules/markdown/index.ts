/*****************************************
 * Package Module Markdown
 *
 * Index
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import { Lexer } from "./lexer";
import { Parser } from "./parser";
import { Builder } from "./builder";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Markdown {
    /**
     * markdown to html element
     *
     * @param {string} markdown
     * @return {HTMLElement}
     */
    public static toHtmlElement(markdown: string): HTMLElement {
        return _markdown.toHtmlElement(markdown);
    }

    /**
     * markdown to html
     *
     * @param {string} markdown
     * @return {string}
     */
    public static toHtml(markdown: string): string {
        return _markdown.toHtml(markdown);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

/**
 * Markdown
 */
class _Markdown {
    /**
     * markdown to html element
     *
     * @param {string} markdown
     * @return {HTMLElement}
     */
    toHtmlElement(markdown: string): HTMLElement {
        const tokens = Lexer.lex(markdown);

        const tree = Parser.parse(tokens);

        const html = Builder.build(tree);

        return html;
    }

    /**
     * markdown to html
     *
     * @param {string} markdown
     * @return {string}
     */
    toHtml(markdown: string): string {
        return this.toHtmlElement(markdown).outerHTML;
    }
}

/**
 * Markdown
 *
 * @type {_Markdown}
 */
const _markdown: _Markdown = new _Markdown();
