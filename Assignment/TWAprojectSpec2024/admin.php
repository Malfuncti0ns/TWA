<!DOCTYPE html>
<html lang="en">

<head>
    <!--Matthew Chiandotto 17800541-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker Admin Page</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="Index.php">Home Page</a>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<a>Hello {$_SESSION['username']}</a>";
        }
        ?>
        <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='Last_Login.php'>Logout</a>";
        }
        ?>
    </div>
    <div class="form-box">
    <form class="new_admin" action="admin_reg.php" method="post" onsubmit="return validateForm()">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" onblur="checkEmptyInput(this);"><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" onblur="checkEmptyInput(this);"><br>
        <label for="username">Email(Username):</label><br>
        <input type="text" id="username" name="username" onblur="checkEmptyInput(this);"><br>
        <label for="mphone">Mobile Phone number:</label><br>
        <input type="text" id="mphone" name="mphone" maxlength="10" onblur="checkEmptyInput(this);"><br>
        <label for="Password">Password:</label><br>
        <input type="password" id="password" name="password" onblur="checkEmptyInput(this);"><br>
        <input type="submit" value="Complete Registration">
    </form>
    </div>
    <!--This worked too well, somethign feels like it's missing but I'm certain it will appear as I progress to the next stage-->
</body>

</html>