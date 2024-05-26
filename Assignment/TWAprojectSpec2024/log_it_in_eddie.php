<?php
session_start();
require_once ('dbconn.php');

//added to test if user was logged in, user not appearing so there is a break in the session from the login to workout_log

//didn't have session_start in the workout_log.php page, that might be the break
//Session_stat is on every page but I'm still getting the above message

//I didn't set the variable for each page, thats my issue
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_SESSION['username'];
    $workout_date = $_POST["workout_date"];
    $exercise_id = $_POST["exercise_id"];
    $duration = $_POST["duration"];
    $distance = $_POST["distance"];
    $notes = $_POST["notes"] ? $_POST["notes"] : NULL;

    $sql = "INSERT INTO workout (user_id, workout_date, exercise_id, duration, distance, notes) 
    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbConn->prepare($sql);
    $stmt->bind_param("isiiis", $user, $workout_date, $exercise_id, $duration, $distance, $notes);

    if ($stmt->execute()) {
        echo "<p>Workout recorded successfully</p>";
    } else {
        echo "<pError: " . $stmt->error . "</p>";
    }
    $dbConn->close();

}