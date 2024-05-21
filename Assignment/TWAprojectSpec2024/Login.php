<?php
session_start();

require_once ('dbconn.php');

$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT 'password', is_admin FROM users WHERE email = '$user'";
$results = $dbConn->query($sql);

//Pulling the password and role from the table users where the email is the username (I've committed to calling it username now)

if ($results->num_rows > 0) {
    $row = $results->fetch_assoc();
    $password_hash = $row['password'];
    $role = $row['is_admin'];

    //checking input for matches and pulling the password and is_admin rows for each true result if there is a result > 0 otherwise it will break with DOM message

    if (password_verify($pass, $password_hash)) {
        $_SESSION['username'] = $user;
        $_SESSION['role'] = $role;

        if ($role === 1) {
            header('Location: admin.php');
        } else {
            header('Location: log.php');
        }
        exit();
    }  else {
    echo "<p>Invalid username or password</p>";
//it's hitting the PHP page on sucess but going all the way to this break
//I'm not comparing the hash, its comparing the plaintext 
}

}
