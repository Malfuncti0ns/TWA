<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<!--Grabs the two inputs, name and hobby from the post process and places them into a session variable for later use,
in this case, moving into exercise6a.php which I was having trouble with the line working but realised you cant use two sets of ""
so the outer is '' for the echo and inner "" for the link-->
<?php
$_SESSION["personName"] = $_POST["personName"];
$_SESSION["hobby"] = $_POST["hobby"];
echo '<a href="exercise6a.php">Session page is this way!</a>';
?>
</body>
</html>
