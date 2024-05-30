<?php
$error_message = "";
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error_message = "Invalid username or password";
}
// Matthew Chiandotto 17800541
// Found at https://stackoverflow.com/questions/20717032/login-error-message-in-php
// This will check the php script (Login.php) for an error flag, in this case error 1, if the error
// is found then it will allocate the variable to the error message, then in the HTML I can include a
// php script that will only appear IF the error flag is true

// This was previously Login_form.html but because I wanted the error message to appear from the php data I've updated
// the file type.

// This did prevent me from looking at in vscode locally but I've used the site manager to test, my thoughts more on getting
// it to work where it's being tested more than locally on my workstations

//Suddenly stopped working, will loop back
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker Login</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="Registration.php">New User Registration</a>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<a>Hello {$_SESSION['username']}</a>";
        } else {
            echo "<a class='login-info' href='Login_form.php'>Login</a>";
        }
        ?>
    </div>
    <div class="form-box">
    <form action="login.php" method="post" onsubmit="return validateForm()">
        <!--Thoughts here, use login.php to query the database using the input details if yes then move to page where we have exercies (May need to update my page names)
        else DOM message saying login failed, no further details for failure message to reduce an attack vector by disclosing information that should have been withheld-->
        <label for="Username">Username:</label>
        <input type="text" id="username" name="username" onblur="checkEmptyInput(this);"><br>
        <label for="Password">Password:</label>
        <input type="password" id="password" name="password" onblur="checkEmptyInput(this);"><br>
        <input type="submit" value="Login">
    </form>
    </div>
    <div class=error_middle>
        <?php
        if ($error_message !== "") {
            echo '<p class="error">' . $error_message . '</p>';
        }
        ?>
    </div>
</body>

</html>