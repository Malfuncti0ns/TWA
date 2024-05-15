<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Week 9 Exercise 1</title>
</head>

<body>
    <?php
    //obtain the firstname input from the $_GET array
    $namestr = $_GET["firstname"];
    $emailstr = $_GET["email"];
    $addstr = $_GET["postaddr"];
    $sportstr = $_GET["favsport"];
    $listcheck = $_GET["emaillist"];
    //obtain the values for the other input devices here
    ?>
    <p>The following information was received from the form:</p>
    <p><strong>name = </strong> <?php echo "$namestr"; ?></p>
    <!--output the other form inputs here -->
    <p><strong>email = </strong> <?php echo "$emailstr";?></p>
    <p><strong>address = </strong><?php echo "$addstr";?></p>
    <p><strong>sport = </strong><?php echo "$sportstr";?></p>
    <p><strong>Mailing list = </strong><?php echo "$listcheck"?></p>

</body>

</html>