const getCaret = (element) => {
    if (element.selectionStart) {
        return element.selectionStart;
    } else if (document.selection) {
        element.focus();

        const selection = document.selection.createRange();
        selection.moveStart('character', -element.value.length);

        return selection.text.length;
    }

    return 0;
};

const resetCursor = (element, position) => {
    if (element.setSelectionRange) {
        element.focus();
        element.setSelectionRange(position, position);
    } else if (element.createTextRange) {
        const range = element.createTextRange();
        range.collapse(true);
        range.moveEnd('character', position);
        range.moveStart('character', position);
        range.select();
    }
};

export const backspace = (element) => {
    const caret = getCaret(element);
    const value = element.value;

    if (caret > 0) {
        element.value =
            value.substring(0, caret - 1) +
            value.substring(caret, value.length);
        resetCursor(element, caret - 1);
    }
};
