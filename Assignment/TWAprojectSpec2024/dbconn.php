<?php
$dbConn = new mysqli('localhost', 'twa004', 'twa004qC', 'Fitness004');
if ($dbConn->connect_error) {
die('Connection error (' . $dbConn->connect_errno . ')'
. $dbConn->connect_error);
} ?>
<?

// Guide followed, tested on TWA site and can see 3 tables, Exercise, users and workout
// Noted that Steve has no mobile, Rose is admin and only steve has a last login date
// Rose is also missing age/height/weight and Bob is missing height/weight
