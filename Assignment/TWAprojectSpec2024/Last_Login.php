<?php
session_start();
require_once('dbconn.php');
// Matthew Chiandotto 17800541
//testing this script, to see if the DB updates logout times. 
//Will run when a logout button is on the Admin or Workout page

if (isset($_SESSION['username'])) {
    
    $username = $_SESSION['username'];

    $updateLogin = "UPDATE users SET last_login = NOW() WHERE email = '$username'";
    $dbConn->query($updateLogin);
    session_destroy();
    header('Location: login_form.html');
    exit();
}
