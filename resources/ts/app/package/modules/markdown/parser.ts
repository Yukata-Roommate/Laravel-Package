/*****************************************
 * Package Module Markdown
 *
 * Parser
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem } from "./contracts/parser/treeItem";
import type { Bundle, ListBundle } from "./contracts/lexer/bundle";

import { HeadingManager } from "./parser/manage/heading";
import { ParagraphManager } from "./parser/manage/paragraph";
import { OrderedListItemManager } from "./parser/manage/listOrderedItem";
import { UnorderedListItemManager } from "./parser/manage/listUnorderedItem";
import { CodeBlockManager } from "./parser/manage/codeBlock";
import { NewLineManager } from "./parser/manage/newLine";
import { HorizontalRuleManager } from "./parser/manage/horizontalRule";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class Parser {
    /**
     * parse markdown bundles
     *
     * @param {Bundle[]} bundles
     * @return {TreeItem[]}
     */
    static parse(bundles: Bundle[]): TreeItem[] {
        return parser.parse(bundles);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _Parser {
    /**
     * tree items
     *
     * @type {TreeItem[]}
     * @readonly
     */
    private readonly tree: TreeItem[] = [];

    /**
     * parse markdown bundles
     *
     * @param {Bundle[]} bundles
     * @return {TreeItem[]}
     */
    parse(bundles: Bundle[]): TreeItem[] {
        this.init();

        for (const bundle of bundles) {
            switch (true) {
                case this.heading.match(bundle):
                    this.pushHeading(bundle);

                    break;

                case this.listOrderedItem.match(bundle):
                    this.addListOrderedItem(bundle as ListBundle);

                    break;

                case this.listUnorderedItem.match(bundle):
                    this.addListUnorderedItem(bundle as ListBundle);

                    break;

                case this.codeBlock.match(bundle):
                    this.addCodeBlock(bundle);

                    break;

                case this.paragraph.match(bundle):
                    this.pushParagraph(bundle);

                    break;

                case this.newLine.match(bundle):
                    this.pushNewLine(bundle);

                    break;

                case this.horizontalRule.match(bundle):
                    this.pushHorizontalRule(bundle);

                    break;

                default:
                    throw new Error(
                        `Unknown token bundle: ${JSON.stringify(bundle)}`
                    );
            }
        }

        this.pushRemainings();

        return this.tree;
    }

    /**
     * push remainings
     *
     * @return {void}
     */
    private pushRemainings(): void {
        this.pushListOrderedItem();
        this.pushListUnorderedItem();
        this.pushCodeBlock();
    }

    /*----------------------------------------*
     * Parse: Init
     *----------------------------------------*/

    /**
     * init
     *
     * @return {void}
     */
    private init(): void {
        this.tree.length = 0;

        this.listOrderedItem.init();
        this.listUnorderedItem.init();
    }

    /*----------------------------------------*
     * Parse: Treeize Heading
     *----------------------------------------*/

    /**
     * heading manager
     *
     * @type {HeadingManager}
     */
    private heading: HeadingManager = new HeadingManager();

    /**
     * push heading
     *
     * @param {Bundle} bundle
     * @return {void}
     */
    private pushHeading(bundle: Bundle): void {
        this.pushRemainings();

        this.tree.push(this.heading.treeize(bundle));
    }

    /*----------------------------------------*
     * Parse: Treeize List Ordered Item
     *----------------------------------------*/

    /**
     * list ordered item manager
     *
     * @type {OrderedListItemManager}
     */
    private listOrderedItem: OrderedListItemManager =
        new OrderedListItemManager();

    /**
     * add list ordered item
     *
     * @param {ListBundle} bundle
     * @return {void}
     */
    private addListOrderedItem(bundle: ListBundle): void {
        this.listOrderedItem.add(bundle);
    }

    /**
     * push list ordered
     *
     * @return {void}
     */
    private pushListOrderedItem(): void {
        const tree: TreeItem | null = this.listOrderedItem.tree;

        if (!tree) return;

        this.tree.push(tree);
    }

    /*----------------------------------------*
     * Parse: Treeize List Unordered Item
     *----------------------------------------*/

    /**
     * list unordered item manager
     *
     * @type {UnorderedListItemManager}
     */
    private listUnorderedItem: UnorderedListItemManager =
        new UnorderedListItemManager();

    /**
     * add list unordered item
     *
     * @param {ListBundle} bundle
     * @return {void}
     */
    private addListUnorderedItem(bundle: ListBundle): void {
        this.listUnorderedItem.add(bundle);
    }

    /**
     * push list unordered
     *
     * @return {void}
     */
    private pushListUnorderedItem(): void {
        const tree: TreeItem | null = this.listUnorderedItem.tree;

        if (!tree) return;

        this.tree.push(tree);
    }

    /*----------------------------------------*
     * Parse: Treeize Code Block
     *----------------------------------------*/

    /**
     * code block manager
     *
     * @type {CodeBlockManager}
     */
    private codeBlock: CodeBlockManager = new CodeBlockManager();

    /**
     * add code block
     *
     * @param {Bundle} bundle
     * @return {void}
     */
    private addCodeBlock(bundle: Bundle): void {
        if (this.codeBlock.isRequirePush(bundle)) this.pushRemainings();

        this.codeBlock.add(bundle);
    }

    /**
     * push code block
     *
     * @return {void}
     */
    private pushCodeBlock(): void {
        const tree: TreeItem | null = this.codeBlock.tree;

        if (!tree) return;

        this.tree.push(tree);
    }

    /*----------------------------------------*
     * Parse: Treeize Paragraph
     *----------------------------------------*/

    /**
     * paragraph manager
     *
     * @type {ParagraphManager}
     */
    private paragraph: ParagraphManager = new ParagraphManager();

    /**
     * push paragraph
     *
     * @param {Bundle} bundle
     * @return {void}
     */
    private pushParagraph(bundle: Bundle): void {
        this.pushRemainings();

        this.tree.push(this.paragraph.treeize(bundle));
    }

    /*----------------------------------------*
     * Parse: Treeize New Line
     *----------------------------------------*/

    /**
     * new line manager
     *
     * @type {NewLineManager}
     */
    private newLine: NewLineManager = new NewLineManager();

    /**
     * push new line
     *
     * @param {Bundle} bundle
     * @return {void}
     */
    private pushNewLine(bundle: Bundle): void {
        this.pushRemainings();

        this.tree.push(this.newLine.treeize(bundle));
    }

    /*----------------------------------------*
     * Parse: Treeize Horizontal Rule
     *----------------------------------------*/

    /**
     * horizontal rule manager
     *
     * @type {HorizontalRuleManager}
     */
    private horizontalRule: HorizontalRuleManager = new HorizontalRuleManager();

    /**
     * push horizontal rule
     *
     * @param {Bundle} bundle
     * @return {void}
     */
    private pushHorizontalRule(bundle: Bundle): void {
        this.pushRemainings();

        this.tree.push(this.horizontalRule.treeize(bundle));
    }
}

/**
 * Markdown Parser
 *
 * @type {_Parser}
 */
const parser: _Parser = new _Parser();
