<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once ('dbconn.php');

//added to test if user was logged in, user not appearing so there is a break in the session from the login to workout_log

//didn't have session_start in the workout_log.php page, that might be the break
//Session_stat is on every page but I'm still getting the above message

//I didn't set the variable for each page, thats my issue

//Above was not the issue, I didn't add the user_id to session data SO when trying to update the workout with the primary key IT HAD NO IDEA WHAT IT WAS
//Updated login.php to also store the user ID


$user = $_SESSION['user_id'];
$workout_date = $_POST["workout_date"];
$exercise_id = $_POST["exercise_id"];
$duration = $_POST["duration"];
$distance = $_POST["distance"];
$notes = $_POST["notes"] ? $_POST["notes"] : NULL;

$sql = "INSERT INTO workout (workout_date, exercise_id, duration, distance, notes) 
    VALUES (?, ?, ?, ?, ?)";
$stmt = $dbConn->prepare($sql);
$stmt->bind_param("sssss", $workout_date, $exercise_id, $duration, $distance, $notes);

if ($stmt->execute()) {
    echo "<p>Workout recorded successfully</p>";
} else {
    echo "<pError: " . $stmt->error . "</p>";
}
$dbConn->close();

