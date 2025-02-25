/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { ParagraphTreeItem } from "./treeItem/paragraph";
import type { HeadingTreeItem } from "./treeItem/heading";
import type { NewLineTreeItem } from "./treeItem/newLine";
import type { HorizontalRuleTreeItem } from "./treeItem/horizontalRule";

import type { OrderedListTreeItem } from "./treeItem/list/ordered";
import type { OrderedListItemTreeItem } from "./treeItem/list/orderedItem";
import type { UnorderedListTreeItem } from "./treeItem/list/unordered";
import type { UnorderedListItemTreeItem } from "./treeItem/list/unorderedItem";

import type { CodeBlockTreeItem } from "./treeItem/code/block";

import type { NormalTextTreeItem } from "./treeItem/child/text/normal";
import type { BoldTextTreeItem } from "./treeItem/child/text/bold";
import type { ItalicTextTreeItem } from "./treeItem/child/text/italic";
import type { StrikeTextTreeItem } from "./treeItem/child/text/strike";
import type { CodeTextTreeItem } from "./treeItem/child/text/code";

import type { NamedLinkTreeItem } from "./treeItem/child/link/named";
import type { NoNameLinkTreeItem } from "./treeItem/child/link/noName";
import type { TelephoneLinkTreeItem } from "./treeItem/child/link/telephone";

import type { HalfSpaceOrnamentTreeItem } from "./treeItem/child/ornament/halfSpace";
import type { FullSpaceOrnamentTreeItem } from "./treeItem/child/ornament/fullSpace";
import type { TabOrnamentTreeItem } from "./treeItem/child/ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { TreeItem, ListTreeItem, ParentTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

type TreeItem =
    | ParagraphTreeItem
    | HeadingTreeItem
    | NewLineTreeItem
    | HorizontalRuleTreeItem
    | OrderedListTreeItem
    | OrderedListItemTreeItem
    | UnorderedListTreeItem
    | UnorderedListItemTreeItem
    | CodeBlockTreeItem
    | NormalTextTreeItem
    | BoldTextTreeItem
    | ItalicTextTreeItem
    | StrikeTextTreeItem
    | CodeTextTreeItem
    | NamedLinkTreeItem
    | NoNameLinkTreeItem
    | TelephoneLinkTreeItem
    | HalfSpaceOrnamentTreeItem
    | FullSpaceOrnamentTreeItem
    | TabOrnamentTreeItem;

type ListTreeItem =
    | OrderedListTreeItem
    | OrderedListItemTreeItem
    | UnorderedListTreeItem
    | UnorderedListItemTreeItem;

type ParentTreeItem =
    | ParagraphTreeItem
    | HeadingTreeItem
    | OrderedListTreeItem
    | OrderedListItemTreeItem
    | UnorderedListTreeItem
    | UnorderedListItemTreeItem
    | CodeBlockTreeItem;
