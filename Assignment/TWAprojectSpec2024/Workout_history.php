<!--Because this will be all in one page, I can set this up like I would log_it_in_eddie and put my PHP script within the page
thinking being that it will still pull the session data and then hit the DB for further queries-->

<!--Nuked the whole thing I had before, why am I making this difficult for myself, I have an example from an exercise we did
just create the table and fill it with the data from the database and then let people filter-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker: Workout History</title>
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
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<a>Hello {$_SESSION['username']}</a>";
        }
        ?>
        <a href="Last_Login.php">Logout</a>
    </div>
    <div class="form-box">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="exercise_type">Exercise Type:</label>
        <select id="exercise_type" name="exercise_type">
            <option value="">All</option>
            <option value="1">Walking</option>
            <option value="2">Running</option>
            <option value="3">Cycling</option>
        </select>
        <input type="submit" name="submit" value="Filter">
    </form>
    </div>
  
    <br>
    <?php
    require_once ("dbconn.php");
    $user = $_SESSION['user_id'];

    #My brain started working, I'm not inputting data into user_id because I'm pulling it from the session
    #I can sort by $user
    
    //Dynamic mail lists came up at work, I searched for dynamic PHP SQL queries and found https://www.php.net/manual/en/mysqli.multi-query.php
    //Theory is, build a base query, which is SELECT * FROM workout WHERE user_id = ? to get all data for that user
    //IF a date is input add an AND statement, IF an exercise is selected AND exercise then end with ORDER BY workout_date

    //Theory failed, still stuck here. Need to spend some time reading about this and finding examples
    

    if (isset($_POST['submit'])) {
        $exercise = ($_POST["exercise_type"]);
        
        $sql = "SELECT * FROM workout WHERE user_id = ? AND exercise_id = $exercise";

        $result = $dbConn->query($sql);

        //new day, new brain, made it an if statement to echo so that the table only appears when its queried but the query is wrong
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>Workout Date</th>
                    <th>Exercise</th>
                    <th>Duration</th>
                    <th>Distance</th>
                    <th>Notes</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row["workout_date"]}</td>
                    <td>{$row["exercise_id"]}</td>
                    <td>{$row["duration"]}</td>
                    <td>{$row["distance"]}</td>
                    <td>{$row["notes"]}</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No workouts found for the specified criteria.</p>";
        }
    }
    $dbConn->close();
    ?>
<!--This table isn't working either by default, CSS is proably going to resolve the issue-->

</body>

</html>