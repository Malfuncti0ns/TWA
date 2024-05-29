<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker Registration</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="login_form.php">Login</a>
    </div>
    <div class="form-box">

    <!--So I did a big mistake, put the JS for the form here and workout_log on the same validateForm script which in the end broke the check for this
    form, I've removed the values from the values used in workout_log and resolved the issue-->
    
    <form class="new_user" action="Register.php" method="post" onsubmit="return validateForm()">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" onblur="checkEmptyInput(this);" required><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" onblur="checkEmptyInput(this);" required><br>
        <label for="username">Email(Username):</label><br>
        <input type="text" id="username" name="username" onblur="checkEmptyInput(this);" required><br>
        <label for="mphone">Mobile Phone number:</label><br>
        <input type="text" id="mphone" name="mphone" maxlength="10" onblur="checkEmptyInput(this);"required><br>
        <label for="Password">Password:</label><br>
        <input type="password" id="password" name="password" onblur="checkEmptyInput(this);"required><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" pattern="\d{1,3}" maxlength="3"><br>
        <label for="weight">Weight(KG):</label><br>
        <input type="number" step="0.01" id="weight" name="weight" pattern="\d{1,3}" maxlength="3"><br>
        <label for="height">Height(CM):</label><br>
        <input type="text" id="height" name="height" pattern="\d{1,3}" maxlength="3"><br>
        <input type="submit" value="Complete Registration">
    </form>
    </div>
</body>

</html>