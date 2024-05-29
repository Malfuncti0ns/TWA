<?php
session_start();
require_once ('dbconn.php');

//added to test if user was logged in, user not appearing so there is a break in the session from the login to workout_log

//didn't have session_start in the workout_log.php page, that might be the break
//Session_stat is on every page but I'm still getting the above message

//I didn't set the variable for each page, thats my issue


$user = $_SESSION['user_id'];
$workout_date = $_POST['date'];
$exercise_id = $_POST["exercise"];
$duration = $_POST["duration"];
$distance = $_POST["distance"];
$notes = $_POST["notes"] ? $_POST["notes"] : NULL;


echo "User ID: " . $user . "<br>";
echo "Workout Date: " . $workout_date . "<br>";
echo "Exercise ID: " . $exercise_id . "<br>";
echo "Duration: " . $duration . "<br>";
echo "Distance: " . $distance . "<br>";
echo "Notes: " . $notes . "<br>";

//Finally had the bright idea to see what was being fed into the DB because it wasn't happy with what I had
//after fixing the exercise ID to be a number with the selection, I saw that it was expecting a user ID
//I had foolishly removed it, added it back in and set it as an int then it worked

$sql = "INSERT INTO workout (user_id, workout_date, exercise_id, duration, distance, notes) 
    VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $dbConn->prepare($sql);
$stmt->bind_param("isssss", $user, $workout_date, $exercise_id, $duration, $distance, $notes);

if ($stmt->execute()) {
    header('Location: Workout_history.php');
    exit();
} else {
    echo "<p>Still spitting errors</p>";
}
$stmt->close();
$dbConn->close();

