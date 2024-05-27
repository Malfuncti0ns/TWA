<?php
session_start();
require_once("dbconn.php");

$sql = "SELECT * FROM workout WHERE user_id = ? ORDER BY workout_date DESC";
$result = $dbConn->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();

//Similar to what I did in admin_reg, getting the result from a query but instead of storing in ->store_result() I'm adding it to a variable 
//for use later and we can iterate over again when you filter

$startdate = $_POST["date_start"];
$enddate= $_POST["date_end"];
$exercise = $_POST["exercise"];

$sql = "SELECT * FROM workout WHERE user_id = ?";
if(!empty($startdate) && !empty($enddate)) {
    $sql = "SELECT * FROM workout WHERE user_id = ? AND workout_date BETWEEN ? AND ? ORDER BY workout_date DESC";
    //https://www.w3schools.com/sql/sql_between.asp using between the dates if either entry is empty (Can't be empty but just in case)
}
if(!empty($exercise)){
    $sql = "SELECT * FROM worout WHERE user_id = ? AND exercise_id = ? ORDER BY workout_date DESC";
}

//stuck here wil come back

?>

<!--Because this will be all in one page, I can set this up like I would log_it_in_eddie and put my PHP script within the page
thinking being that it will still pull the session data and then hit the DB for further queries-->

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
    <method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="date_start">Start date:</label>
    <input type="date" id="date_start" name="date_start">
    <label for="date_end">End date:</label>
    <input type="date" id="end_date" name="end date">
    <label for="exercise">Exercise Type:</label>
    <select id="exercise" name="exercise">
    <option value="">All</option>
    <option value="1">Walking</option>
    <option value="2">Running</option>
    <option value="3">Cycling</option>
    </select>
    <input type="submit">
    </form>

    <a href="Last_Login.php">Logout!</a>

</html>