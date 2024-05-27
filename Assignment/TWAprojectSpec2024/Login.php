<?php
session_start();

require_once ('dbconn.php');

$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT user_id, password, is_admin FROM users WHERE email = '$user'";
$results = $dbConn->query($sql);

//Pulling the password and role from the table users where the email is the username (I've committed to calling it username now)

//Previous had SELECT 'password' which was causing issues with which password it was pulling from (Form or DB), removed the ' ' and got the result I was looking for

if ($results->num_rows > 0) {
    $row = $results->fetch_assoc();
    $password_hash = $row['password'];
    $role = $row['is_admin'];

    //checking input for matches and pulling the password and is_admin rows for each true result if there is a result > 0 otherwise it will break with DOM message

    //Add password from session to a hash within the php and compare below

    $input_hash = hash('sha256', $pass);

    if ($input_hash === $password_hash) {
        $_SESSION['username'] = $user;
        $_SESSION['role'] = $role;
        $_SESSION['user_id'] = $user_id;

        if ($role === '1') {
            //Here I made the mistake of leaving just 1 because it was looking for an int instead of the literal 1, added ' ' and got an admin to login to the
            //right page
            header('Location: admin.php');
            exit();
        } else {
            header('Location: workout_log.php');
            exit();
        }
    } else {
        header('Location: login_form.php');
        exit();
        //it's hitting the PHP page on sucess but going all the way to this break
        //I'm not comparing the hash, its comparing the plaintext 
    }
} else {
    header('Location: login_form.php');
    exit();
    //I missed an else statement here to loop back, need to provide context to user as to why though
}
