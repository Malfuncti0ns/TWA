<!--Matthew Chiandotto 17800541-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker: Workout Statistics</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="Workout_log.php">Workout log</a>
        <a href="Workout_history.php">Workout History</a>

        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $date = date("d-m-Y H:i:s");
            echo "<a>Hello {$_SESSION['first_name']} todays date is $date </a>";
        }
        ?>
        <?php
        if (isset($_SESSION['last_login'])) {
            echo "<a>Last login: {$_SESSION['last_login']}</a>";
        }
        ?>
        <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='Last_Login.php'>Logout</a>";
        }
        ?>
    </div>
    <?php
    require_once ("dbconn.php");
    $user = $_SESSION['user_id'];
    $sql = "SELECT workout.*, exercise.name FROM workout INNER JOIN exercise WHERE user_id = $user";
    $result = $dbConn->query($sql);
    ?>
    <!--Going to pull all the data from the page, then get each row and do the math on it, similar to what I would do if I was
    working something out in python, give a variable (x for example) = val 1 / val 2 and then echo the result
    The table itself is being a pain though and not appearing as a table, its just a straight line. Lets see if removing css is the root cause

    The SQL is pulling all the data, need to only have the user_id that matches the session and the exercise ID matching. Trying to remember my joins
    was my worst part of the database subject I did a few years ago-->

    <!--Join is working to pull the name but the data is wrong, it's adding a workout for each category and twice -->

    <!--CSS was the issue, it was inherting from the body, inspecting is key but now I need the name of the exercise not just the number-->

    <div class="table_design">
        <table>
            <tr>
                <th>Workout Date</th>
                <th>Exercise Name</th>
                <th>Duration (Mins)</th>
                <th>Distance (KM)</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["workout_date"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["duration"] ?></td>
                    <td><?php echo $row["distance"] ?></td>
                </tr>

            <?php }
            $dbConn->close();
            ?>
        </table>
    </div>
</body>

</html>