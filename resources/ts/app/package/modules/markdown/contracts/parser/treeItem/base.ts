/*****************************************
 * Package Module Markdown Contracts
 *
 * Parser Tree Item Base
 *****************************************/

/*----------------------------------------*
 * Exports
 *----------------------------------------*/

export type { _TreeItem, ParentTreeItem };

/*----------------------------------------*
 * Types
 *----------------------------------------*/

/**
 * Markdown Tree Item
 */
type _TreeItem = {
    /**
     * tree item type
     *
     * @type {string}
     */
    type: string;
};

/**
 * Markdown Parent Tree Item
 */
type ParentTreeItem = _TreeItem & {
    /**
     * tree item children
     *
     * @type {_TreeItem[]}
     */
    children: _TreeItem[];
};
