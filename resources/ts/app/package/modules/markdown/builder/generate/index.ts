/*****************************************
 * Package Module Markdown Builder
 *
 * Generate Index
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem } from "../../contracts/parser/treeItem";

import type { BaseGenerator } from "./base";

import { HeadingGenerator } from "./heading";
import { ParagraphGenerator } from "./paragraph";

import { BoldTextGenerator } from "./text/bold";
import { CodeTextGenerator } from "./text/code";
import { ItalicTextGenerator } from "./text/italic";
import { NormalTextGenerator } from "./text/normal";
import { StrikeTextGenerator } from "./text/strike";

import { NamedLinkGenerator } from "./link/named";
import { NoNameLinkGenerator } from "./link/noName";
import { TelephoneLinkGenerator } from "./link/telephone";

import { OrderedListGenerator } from "./list/ordered";
import { OrderedListItemGenerator } from "./list/orderedItem";
import { UnorderedListGenerator } from "./list/unordered";
import { UnorderedListItemGenerator } from "./list/unorderedItem";

import { CodeBlockGenerator } from "./code/block";

import { HalfSpaceOrnamentGenerator } from "./ornament/halfSpace";
import { FullSpaceOrnamentGenerator } from "./ornament/fullSpace";
import { TabOrnamentGenerator } from "./ornament/tab";
import { NewLineOrnamentGenerator } from "./ornament/newLine";
import { HorizontalRuleOrnamentGenerator } from "./ornament/horizontalRule";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Generator {
    /**
     * generate html element
     *
     * @param {TreeItem} treeItem
     * @return {HTMLElement}
     */
    static generate(treeItem: TreeItem): HTMLElement {
        return generator.generate(treeItem);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _Generator {
    /**
     * generate html element
     *
     * @param {TreeItem} treeItem
     * @return {HTMLElement}
     */
    generate(treeItem: TreeItem): HTMLElement {
        const generators: BaseGenerator[] = this.generators();

        for (const generator of generators) {
            if (!generator.match(treeItem)) continue;

            const element = generator.generate(treeItem);

            if ("children" in treeItem) {
                treeItem.children.forEach((child) => {
                    element.appendChild(this.generate(child as TreeItem));
                });
            }

            return element;
        }

        throw new Error(
            `No generator found for item: ${JSON.stringify(treeItem)}`
        );
    }

    /**
     * get generators
     *
     * @return {BaseGenerator[]}
     */
    private generators(): BaseGenerator[] {
        return [
            new HeadingGenerator(),
            new ParagraphGenerator(),

            new BoldTextGenerator(),
            new CodeTextGenerator(),
            new ItalicTextGenerator(),
            new NormalTextGenerator(),
            new StrikeTextGenerator(),

            new NamedLinkGenerator(),
            new NoNameLinkGenerator(),
            new TelephoneLinkGenerator(),

            new OrderedListGenerator(),
            new OrderedListItemGenerator(),
            new UnorderedListGenerator(),
            new UnorderedListItemGenerator(),

            new CodeBlockGenerator(),

            new HalfSpaceOrnamentGenerator(),
            new FullSpaceOrnamentGenerator(),
            new TabOrnamentGenerator(),
            new NewLineOrnamentGenerator(),
            new HorizontalRuleOrnamentGenerator(),
        ];
    }
}

/**
 * Markdown Builder Generator
 *
 * @type {_Generator}
 */
const generator: _Generator = new _Generator();
