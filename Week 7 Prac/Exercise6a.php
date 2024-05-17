<?php
session_start();

$personName = $_SESSION["personName"];
$hobby = $_SESSION["hobby"];

echo "<p>Hello $personName. Your hobby is $hobby</p>";

echo '<p><a href="exercise6.html">Want to input something new?!</a></p>';