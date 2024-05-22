<?php

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

$sql = "INSERT INTO users (first_name, last_name, email, mobile, password, age, height, weight) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        //Previous versions I was sending the is_admin and date_registered to the DB whch was giving me errors.
        //Removed everything EXCEPT the fields that I was passing through to the database and it worked

        //Have not done a check for unique emails, will come back for this step time permitting but I want to get all pages working
        //before I clear out some of the error checking, this is going tot take some time
        
        //Thinking while on my lunch break, if I use a similar query to check the rows of email and if it === existing then bounce back
        //to registraion page with error message

$stmt = $dbConn->prepare($sql);
$stmt->bind_param("ssssssss", $firstname, $lastname, $email, $mobile, $password_hash, $age, $height, $weight);


if ($stmt->execute()){
    header('Location: login_form.php');
    exit();
} else {
    echo "Error: " . $stmt->error;
    //This saved me with debugging, I could see the break was here because of https://www.php.net/manual/en/mysqli-stmt.error.php
}

$stmt->close();
$dbConn->close();

