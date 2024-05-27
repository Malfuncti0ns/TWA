<!--Because this will be all in one page, I can set this up like I would log_it_in_eddie and put my PHP script within the page
thinking being that it will still pull the session data and then hit the DB for further queries-->

<!--Nuked the whole thing I had before, why am I making this difficult for myself, I have an example from an exercise we did
just create the table and fill it with the data from the database and then let people filter-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker: Workout Log</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>
<!--Thoughts before I take a break from coding the assignment, this will require a search to be done on itself so like an 
exercise we did, I can use $_SERVER["PHP_SELF"] to refer back on itself but after I query the database so that the page
has the data from the databse and once a filter is applied, its applying it to the stored data on the page-->

<body>

    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <div class="Navigation">
        <a href="Workout_log.php">Workout log</a>
        <a href="Workout_stats.php">Workout Statistics</a>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <label for="exercise_type">Exercise Type:</label>
        <select id="exercise_type" name="exercise_type">
            <option value="">All</option>
            <option value="1">Walking</option>
            <option value="2">Running</option>
            <option value="3">Cycling</option>
        </select>
        <input type="submit" name="submit" value="Filter">
    </form>
    <a href="Last_Login.php">Logout!</a>
    <br>
    <?php
    session_start();
    require_once ("dbconn.php");
    $user = $_SESSION['user_id'];

    #My brain started working, I'm not inputting data into user_id because I'm pulling it from the session
    #I can sort by $user
    
    if (isset($_POST['submit'])) {
        $start_date = ($_POST["start_date"]);
        $end_date = ($_POST["end_date"]);
        $exercise = ($_POST["exercise_type"]);

        if ($exercise == "") {
            $sql = "SELECT * FROM workout WHERE user_id = $user ORDER BY workout_date";
            $result = $dbConn->query($sql);
        } else {
            $sql = "SELECT * FROM workout WHERE user_id = $user AND exercise = ?ORDER BY workout_date";
            $result = $dbConn->query($sql);
        }
    }

    #Select * is working but the filtering by exercise isnt
    ?>

<table>
    <tr>
        <th>Workout Date</th>
        <th>Exercise</th>
        <th>Duration</th>
        <th>Distance</th>
        <th>Notes</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["workout_date"]; ?></td>
            <td><?php echo $row["exercise_id"]; ?></td>
            <td><?php echo $row["duration"]; ?></td>
            <td><?php echo $row["distance"]; ?></td>
            <td><?php echo $row["notes"]; ?></td>
        </tr>
    <?php } ?>
</table>
    <?php
    $dbConn->close();
    ?>
<!--This table isn't working either by default, CSS is proably going to resolve the issue-->

</body>

</html>