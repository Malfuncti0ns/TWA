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
            echo "<a>Hello {$_SESSION['username']}</a>";
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
    $sql = "SELECT * FROM workout WHERE user_id = $user";
    $result = $dbConn->query($sql);

    //Going to pull all the data from the page, then get each row and do the math on it, similar to what I would do if I was
    //working something out in python, give a variable (x for example) = val 1 / val 2 and then echo the result
    
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
    $dbConn->close();
    ?>
</body>

</html>