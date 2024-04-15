function checkEmptyInput(inputItem) {
    let length = inputItem.value.length;
    if (length == 0) {
        inputItem.style.background = "#ffb3b3";
    } else {
        inputItem.style.background = "#e6f9ff";
    }
}

function validateForm() {
    var title = document.getElementById("title").value;
    var firstName = document.getElementById("fname").value;
    var letters = /^[a-zA-Z]*$/;

    if (title === "") {
        alert("Please select a title.");
        return false;
    }

    if (firstName.trim() === "") {
        alert("Please enter your first name.");
        return false;
    }

    if (!letters.test(firstName)) {
        alert("Please enter a valid name.");
        return false
    }
    return true;
}
