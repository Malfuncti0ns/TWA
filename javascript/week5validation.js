function checkEmptyInput (inputItem) {
    let length = inputItem.value.length;
    if (length == 0) {
    inputItem.style.background = "#ffb3b3";
    } else {
    inputItem.style.background = "#e6f9ff";
    }
    }