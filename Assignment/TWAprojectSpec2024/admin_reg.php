<?php
//Matthew Chiandotto 17800541

//This can all be pretty much transfered over from the user registration since it's not updating
//it's only adding new unique users as admins

//Removed all previous comments, please refer to register.php for notes

session_start();
require_once ("dbconn.php");

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$email = $_POST["username"];
$mobile = ($_POST["mphone"]);
$password = $_POST["password"];

$password_hash = hash('sha256', $password);


$check_email = "SELECT email from users WHERE email = ?";
$check_email = $dbConn->prepare("$check_email");
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();



if ($check_email->num_rows > 0) {
    echo "<div class='error_middle'>
    <p class = email_error>Email already in use</p>
    <a class = go_back href=/twa/twa004/project/admin.php><strong>Go back</strong></a>
    </div>";
   
    $check_email->close();
    $dbConn->close();
    exit();


} else {
    $sql = "INSERT INTO users (first_name, last_name, email, mobile, password, is_admin, age, height, weight) 
        VALUES (?, ?, ?, ?, ?, 1, ?, ?, ?)";


    $stmt = $dbConn->prepare($sql);
    $stmt->bind_param("ssssssss", $firstname, $lastname, $email, $mobile, $password_hash, $age, $height, $weight);


    if ($stmt->execute()) {
        echo"<h3>Admin has been added</h3>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
        //This saved me with debugging, I could see the break was here because of https://www.php.net/manual/en/mysqli-stmt.error.php
    }

    $stmt->close();
    $dbConn->close();
}
