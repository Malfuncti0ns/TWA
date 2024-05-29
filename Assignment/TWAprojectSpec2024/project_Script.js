function checkEmptyInput(inputItem) {
    let length = inputItem.value.length;
    if (length == 0) {
        inputItem.style.background = "#ffb3b3";
    } else {
        inputItem.style.background = "#e6f9ff";
    }
}

function validateForm() {
    var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    var firstname = document.getElementById("fname").value;
    var lastname = document.getElementById("lname").value;
    var age = document.getElementById("age").value;
    var weight = document.getElementById("weight").value;
    var height = document.getElementById("height").value;
    var letters = /^[a-zA-Z]*$/;
    var emailpat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var numbers = /^[0-9]*$/;


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


    if (pass.length < 8) {
        alert("Password must be at least 8 characters long");
        return false;
    }

    if (firstname === "") {
        alert("Please enter a first name");
        return false;
    }

    if (!letters.test(firstname)) {
        alert("Please enter a valid first name");
        return false;
    }

    if (lastname === "") {
        alert("Please enter a valid last name");
        return false;
    }

    if (!letters.test(lastname)) {
        alert("Please enter a valid last name");
        return false;
    }
    if (!numbers.test(age)) {
        alert("Please enter a valid age");
        return false;
    }

    if (!numbers.test(weight)) {
        alert("Please enter a valid weight");
        return false;
    }

    if (!numbers.test(height)) {
        alert("Please enter a valid height");
        return false;
    }

    return true;
}

function validateWorkout() {

    var exercise = document.getElementById("exercise").value;
    var duration = document.getElementById("duration").value;
    var distance = document.getElementById("distance").value;
    var notes = document.getElementById("notes").value;

    var numbers = /^[0-9]*$/;
    var specialChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    if (!exercise) {
        alert("Please select an exercise");
        return false;
    }

    if (!numbers.test(duration)) {
        alert("Please enter only numbers");
        return false;
    }

    if (!numbers.test(distance)) {
        alert("Please enter only numbers");
        return false;
    }

    if (specialChars.test(notes)) {
        alert("No special characters in notes");
        return false;
    }
}