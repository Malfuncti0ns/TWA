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
    var lastName = document.getElementById("lname").value;
    var letters = /^[a-zA-Z]*$/;
    var numbers = /^[0-9]*$/;
    var dob = document.getElementById("dob").value;
    var birthCountry = document.getElementById("bCountry").value;
    var addressL1 = document.getElementById("addressL1").value;
    var suburb = document.getElementById("suburb").value;
    var state = document.getElementById("state").value;
    var pCode = document.getElementById("postcode").value;
    var hPhone = document.getElementById("hphone").value;
    var mPhone = document.getElementById("mphone").value;
    var mediCare = document.getElementById("kin_medino").value;
    var mediId = document.getElementById("kin_mediid").value;

    if (title === "") {
        alert("Please select a title");
        return false;
    }

    if (firstName === "") {
        alert("Please enter your first name");
        return false;
    }

    if (!letters.test(firstName)) {
        alert("Please enter a valid first name");
        return false;
    }

    if (lastName === "") {
        alert("Please enter your last name");
        return false;
    }

    if (!letters.test(lastName)) {
        alert("Please enter a valid last name");
        return false;
    }

    if (dob === ""){
        alert("Please enter a date of birth");
        return false;
    }

    if (birthCountry === ""){
        alert("Please enter a country of birth");
        return false
    }

    if (!letters.test(birthCountry)) {
        alert("Please enter a valid birth country");
        return false;
    }

    if (addressL1 === "" | suburb === "" | state === "") {
        alert("Please enter a valid address");
        return false;
    }

    if (pCode.length !== 4) {
        alert("Please enter a 4 digit postcode");
        return false;
    }

    if (!pCode.test(numbers)) {
        alert("Please enter only numbers");
        return false;
    }

    if (hPhone && hPhone.length !==10) {
        alert("Please enter a 10 digit home phone number");
        return false;
    }

    if (mPhone && mPhone.length !==10) {
        alert("Please enter a 10 digit mobile phone number");
        return false;
    }

    if (mediCare.length !==12) {
        alert("Please enter a 12 digit medicare number");
        return false;
    }

    if (mediId.length !=1) {
        alert("Please enter your medicare ID number");
        return false;
    }

    return true;
}
