/*****************************************
 * Package Module Markdown Parser
 *
 * Treeize Child Index
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { TreeItem } from "../../../contracts/parser/treeItem";

import type { Token } from "../../../contracts/lexer/token";

import { BaseChildTreeizer } from "./base";

import { BoldTextTreeizer } from "./text/bold";
import { CodeTextTreeizer } from "./text/code";
import { ItalicTextTreeizer } from "./text/italic";
import { NormalTextTreeizer } from "./text/normal";
import { StrikeTextTreeizer } from "./text/strike";

import { NamedLinkTreeizer } from "./link/named";
import { NoNameLinkTreeizer } from "./link/noName";
import { TelephoneLinkTreeizer } from "./link/telephone";

import { FullSpaceOrnamentTreeizer } from "./ornament/fullSpace";
import { HalfSpaceOrnamentTreeizer } from "./ornament/halfSpace";
import { TabOrnamentTreeizer } from "./ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export class ChildTreeizer {
    /**
     * treeize markdown text
     *
     * @param {Token} token
     * @return {TreeItem}
     */
    static treeize(token: Token): TreeItem {
        return treeizer.treeize(token);
    }
}

/*----------------------------------------*
 * Class
 *----------------------------------------*/

class _ChildTreeizer {
    /**
     * treeize markdown text
     *
     * @param {Token} token
     * @return {TreeItem}
     */
    treeize(token: Token): TreeItem {
        for (let treeizer of this.treeizers()) {
            if (!treeizer.match(token)) continue;

            return treeizer.treeize(token);
        }

        throw new Error(`No treeizer found for token: ${JSON.stringify(token)}`);
    }

    /**
     * get treeizers
     *
     * @return {BaseChildTreeizer[]}
     */
    private treeizers(): BaseChildTreeizer[] {
        return [
            new NormalTextTreeizer(),
            new BoldTextTreeizer(),
            new CodeTextTreeizer(),
            new ItalicTextTreeizer(),
            new StrikeTextTreeizer(),

            new NamedLinkTreeizer(),
            new NoNameLinkTreeizer(),
            new TelephoneLinkTreeizer(),

            new FullSpaceOrnamentTreeizer(),
            new HalfSpaceOrnamentTreeizer(),
            new TabOrnamentTreeizer(),
        ];
    }
}

/**
 * Markdown Parser Treeizer
 *
 * @type {_ChildTreeizer}
 */
const treeizer: _ChildTreeizer = new _ChildTreeizer();
