/*****************************************
 * Package Module Markdown Contracts
 *
 * Lexer Token
 *****************************************/

/*----------------------------------------*
 * Imports
 *----------------------------------------*/

import type { NormalTextToken } from "./token/text/normal";
import type { BoldTextToken } from "./token/text/bold";
import type { ItalicTextToken } from "./token/text/italic";
import type { StrikeTextToken } from "./token/text/strike";
import type { CodeTextToken } from "./token/text/code";

import type { NamedLinkToken } from "./token/link/named";
import type { NoNameLinkToken } from "./token/link/noName";
import type { TelephoneLinkToken } from "./token/link/telephone";

import type { HalfSpaceOrnamentToken } from "./token/ornament/halfSpace";
import type { FullSpaceOrnamentToken } from "./token/ornament/fullSpace";
import type { TabOrnamentToken } from "./token/ornament/tab";

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { Token };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

type Token =
    | NormalTextToken
    | BoldTextToken
    | ItalicTextToken
    | StrikeTextToken
    | CodeTextToken
    | NamedLinkToken
    | NoNameLinkToken
    | TelephoneLinkToken
    | HalfSpaceOrnamentToken
    | FullSpaceOrnamentToken
    | TabOrnamentToken;