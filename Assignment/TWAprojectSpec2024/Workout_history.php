<?php
session_start();
$_SESSION['username'] = $username;
$_SESSION['user_id'] = $user_id; 
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

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="Workout_log.php">Workout log</a>
        <<a href="Workout_stats.php">Workout Statistics</a>
    </div>


    <a href="Last_Login.php">Logout!</a>

</html>