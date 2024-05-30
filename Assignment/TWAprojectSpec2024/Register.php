<?php
// Matthew Chiandotto 17800541
session_start();
require_once ("dbconn.php");

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$email = $_POST["username"];
$mobile = ($_POST["mphone"]) ? $_POST["mphone"] : NULL;
$password = $_POST["password"];
$age = ($_POST["age"]) ? $_POST["age"] : NULL;
$height = ($_POST["height"]) ? $_POST["height"] : NULL;
$weight = ($_POST["weight"]) ? $_POST["weight"] : NULL;

$password_hash = hash('sha256', $password);

// Inserting into the DB through PHP found here https://stackoverflow.com/questions/37367992/php-inserting-values-from-the-form-into-mysql
// Reading that it protects from malicious input because we aren't feeding direct commands into the DB, we are telling it that it's a string or int
// specifically from the example on the link $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $_POST['password']); "sss" is passing all 3 values as strings
// i would be an int which I can use for age and height while weight is a float as per the table so that will be f
// my only concern is adding to the table and not having a primary key value assigned but it has been said that this will automatically be assigned when adding
// Need to also add registration date to this file, that shouldn't be too complicated as I've used a similar date registration for last login that I can probably apply here


$check_email = "SELECT email from users WHERE email = ?";
$check_email = $dbConn->prepare("$check_email");
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();


//https://stackoverflow.com/questions/35116807/what-is-the-difference-between-get-result-and-store-result-in-php
//Another similar example I stumbled upon when looking at what I can do to store a result in php, similar enough but I had to move
//some of the order but it gave me a baseline to start with
//Pull the data, bind it and then store the result to compare at the begining, wrapping the whole previous work in an if statment    

if ($check_email->num_rows > 0) {
    echo "<div class='error_middle'>
    <p class = email_error>Email already in use</p>
    <a class = go_back href=/twa/twa004/project/registration.php><strong>Go back</strong></a>
    </div>";
    $check_email->close();
    $dbConn->close();
    exit();
//Works to give a way back, there is a way to add a page back after a time but I'll come back to review. This does meet the requiements to return back with
//error message


} else {
    $sql = "INSERT INTO users (first_name, last_name, email, mobile, password, age, height, weight) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    //Previous versions I was sending the is_admin and date_registered to the DB whch was giving me errors.
//Removed everything EXCEPT the fields that I was passing through to the database and it worked

    //Have not done a check for unique emails, will come back for this step time permitting but I want to get all pages working
//before I clear out some of the error checking, this is going tot take some time

    //Thinking while on my lunch break, if I use a similar query to check the rows of email and if it === existing then bounce back
//to registraion page with error message

    //Better idea (found https://stackoverflow.com/questions/46622236/how-to-separately-check-if-php-username-or-email-exists-in-database)
//I don't need to compare each row, if any appear and then if it's >0 send message to user on registration screen

    $result = $dbConn->prepare($sql);
    $result->bind_param("ssssssss", $firstname, $lastname, $email, $mobile, $password_hash, $age, $height, $weight);


    if ($result->execute()) {
        header('Location: login_form.php');
        exit();
    } else {
        echo "Error: " . $result->error;
        //This saved me with debugging, I could see the break was here because of https://www.php.net/manual/en/mysqli-stmt.error.php
    }

    $result->close();
    $dbConn->close();
}
