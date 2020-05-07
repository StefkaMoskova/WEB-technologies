function changeListStyle(value) {
    node = getSelectionContainerElement();
    while (node.tagName != 'UL')
        node = node.parentNode;
    node.className = value;
}

function getSelectionContainerElement() {
    var range, sel, container;
    if (document.selection && document.selection.createRange) {
        range = document.selection.createRange();
        return range.parentElement();
    } else if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt) {
            if (sel.rangeCount > 0)
                range = sel.getRangeAt(0);
        } else {
            range = document.createRange();
            range.setStart(sel.anchorNode, sel.anchorOffset);
            range.setEnd(sel.focusNode, sel.focusOffset);

            if (range.collapsed !== sel.isCollapsed) {
                range.setStart(sel.focusNode, sel.focusOffset);
                range.setEnd(sel.anchorNode, sel.anchorOffset);
            }
        }
        if (range) {
            container = range.commonAncestorContainer;
            return container.nodeType === 3 ? container.parentNode : container;
        }
    }
}