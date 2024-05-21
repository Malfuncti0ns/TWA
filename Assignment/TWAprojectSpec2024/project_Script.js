function checkEmptyInput(inputItem) {
    let length = inputItem.value.length;
    if (length == 0) {
        inputItem.style.background = "#ffb3b3";
    } else {
        inputItem.style.background = "#e6f9ff";
    }
}
//Re-used from week6 validation, not quite my final product but at least indicates that the JS is working

function validateForm() {
    var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    var emailpat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    //var letters = /^[a-zA-Z]*$/;
    //var numbers = /^[0-9]*$/;
    //These were my baseline for an email check, instead of checking for a var of letters, numbers and an @ symbol, why not check a pattern?
    //setting up an order to the check so "a-z & numbers" + @ + . "a-z" (Numbers can be used in a domain but not common practice and also outside of scope for this case)
    //Guide from stackoverflow https://stackoverflow.com/questions/46155/how-can-i-validate-an-email-address-in-javascript

    if (user === "") {
        alert("Please enter a username");
        return false;
    }

    if (!emailpat.test(user)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (pass === "") {
        alert("Please enter a password");
        return false;
    }

    


}