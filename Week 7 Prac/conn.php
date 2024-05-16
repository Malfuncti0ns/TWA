<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $dbConn = new mysqli("localhost", "TWA_student", "TWA_2024_Autumn", "electrical");
    if($dbConn->connect_error) {
    die("Failed to connect to database " . $dbConn->connect_error);
    }
    ?>
</body>
</html>