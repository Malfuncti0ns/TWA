<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker: Workout Log</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>
<!--Thoughts before working on form for log
Page is similar to registration, I'm adding to the workout table depeding on who is logged in at the time

Will need to use session data to know who is logging the workout, I've also just updated the home page link in my vscode
to make the index a php page since I've realised I'll need to maintain a session for the login data.
-->

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="Workout_history.php">Workout History</a>
        <a href="Workout_stats.php">Workout Statistics</a>
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
        <form class="log_workout" action="log_it_in_eddie.php" method="post" onsubmit="return validateForm()">
            <label for="date">Workout Date and Time:</label>
            <input type="datetime-local" id="date" name="date" onblur="checkEmptyInput(this);">
            <br>
            <br>
            <label>Exercise:</label>
            <label for="walking">
                <input type="radio" id="walking" name="exercise" value="1">
                Walking
            </label>
            <label for="running">
                <input type="radio" id="running" name="exercise" value="2">
                Running
            </label>
            <label for="cycling">
                <input type="radio" id="cycling" name="exercise" value="3">
                Cycling
            </label>
            <br>
            <label for="duration">Duration(Minutes):</label>
            <input type="string" id="duration" name="duration" onblur="checkEmptyInput(this);">
            <br>

            <label for="distance">Distance(KM):</label>
            <input type="string" id="distance" name="distance" onblur="checkEmptyInput(this);">
            <br>
            <label for="notes">Workout Notes:</label>
            <textarea id="notes" name="notes" rows="4" cols="30"></textarea>
            <br>
            <!--https://www.w3schools.com/tags/tag_textarea.asp
        Used straight from example with a smaller area to test, may update later-->
            <input type="submit" value="Log Workout">
        </form>
    </div>
</body>

</html>