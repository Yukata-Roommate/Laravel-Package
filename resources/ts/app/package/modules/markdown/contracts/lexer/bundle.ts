/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Bundle
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParagraphBundle } from "./bundle/paragraph";
import type { HeadingBundle } from "./bundle/heading";
import type { NewLineBundle } from "./bundle/newLine";
import type { HorizontalRuleBundle } from "./bundle/horizontalRule";

import type { OrderedListItemBundle } from "./bundle/list/orderedItem";
import type { UnorderedListItemBundle } from "./bundle/list/unorderedItem";

import type { CodeBlockBundle } from "./bundle/code/block";
import type { CodeInnerBundle } from "./bundle/code/inner";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { Bundle, ListBundle };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

type Bundle =
    | ParagraphBundle
    | HeadingBundle
    | NewLineBundle
    | HorizontalRuleBundle
    | OrderedListItemBundle
    | UnorderedListItemBundle
    | CodeBlockBundle
    | CodeInnerBundle;

type ListBundle = OrderedListItemBundle | UnorderedListItemBundle;
