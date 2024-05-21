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
    var firstname = document.getElementById("fname").value;
    var lastname = docuemnt.getElementById("lname").value;
    var age = document.getElementById("age").value;
    var weight = document.getElementById("weight").value;
    var height = document.getElementById("height").value;
    var letters = /^[a-zA-Z]*$/;
    var emailpat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    var numbers = /^[0-9]*$/;
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
    //Above was for my first run through for the login for but can be used again for registration since they are the same values and requriements

    if (pass.length < 8){
        alert("Password must be at least 8 characters long");
        return false;
    }
    
    if (firstname === "") {
        alert("Please enter a first name");
        return false;
    }

    if(!letters.test(firstname)){
        alert("Please enter a valid first name");
    }

    if (lastname === ""){
        alert("Please enter a valid last name");
        return false;
    }

    if(!letters.test(lastname)){
        alert("Please enter a valid last name");
    }

    //Tests below for valid input from age, weight and height because I'm using a text box instead of number
    if(!numbers.test(age)){
        alert("Please enter a valid age");
    }

    if(!numbers.test(weight)){
        alert("Please enter a valid weight");
    }

    if(!numbers.test(height)){
        alert("Please enter a valid height");
    }
}