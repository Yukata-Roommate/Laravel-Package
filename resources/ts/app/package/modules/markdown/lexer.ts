/*****************************************
 * Package Module Markdown
 *
 * Lexer
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { Bundle } from "./contracts/lexer/bundle";

import { Bundler } from "./lexer/bundle";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Lexer {
    /**
     * lex markdown text
     *
     * @param {string} markdown
     * @return {Bundle[]}
     */
    static lex(markdown: string): Bundle[] {
        return lexer.lex(markdown);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _Lexer {
    /**
     * lex markdown text
     *
     * @param {string} markdown
     * @return {Bundle[]}
     */
    lex(markdown: string): Bundle[] {
        const rows: string[] = markdown.split("\n");

        const bundles: Bundle[] = [];

        for (const row of rows) {
            const bundle = this.bundle(row);

            if (bundle === null) continue;

            bundles.push(bundle);
        }

        return bundles;
    }

    /*----------------------------------------*
     * Bundle
     *----------------------------------------*/

    /**
     * get bundle
     *
     * @param {string} row
     * @return {Bundle | null}
     */
    private bundle(row: string): Bundle | null {
        const bundle = Bundler.bundle(row);

        if (this.isBundleCodeBlock(bundle)) {
            this.toggleCodeMode();

            return this.isCodeMode ? bundle : null;
        }

        if (this.isCodeMode) return Bundler.codeInner(row);

        return bundle;
    }

    /**
     * whether is Bundle Code Block
     *
     * @param {Bundle} bundle
     * @return {boolean}
     */
    private isBundleCodeBlock(bundle: Bundle): boolean {
        return bundle.type === "code-block";
    }

    /*----------------------------------------*
     * Bundle Mode
     *----------------------------------------*/

    /**
     * whether code mode
     *
     * @type {boolean}
     */
    private isCodeMode: boolean = false;

    /**
     * toggle code mode
     *
     * @return {void}
     */
    private toggleCodeMode(): void {
        this.isCodeMode = !this.isCodeMode;
    }
}

/**
 * Markdown Lexer
 *
 * @type {_Lexer}
 */
const lexer: _Lexer = new _Lexer();
