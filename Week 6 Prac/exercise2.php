<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Week 9 Exercise 2</title>
</head>

<body>
    <?php
    //obtain the firstname input from the $_GET array
    //Above is now post because of the change in method so we use $_POST
    $namestr = $_POST["firstname"];
    $emailstr = $_POST["email"];
    $addstr = $_POST["postaddr"];
    $sportstr = $_POST["favsport"];
    $listcheck = $_POST["emaillist"];
    //obtain the values for the other input devices here
    ?>
    <p>The following information was received from the form:</p>
    <p><strong>name = </strong> <?php echo "$namestr"; ?></p>
    <!--output the other form inputs here -->
    <p><strong>email = </strong> <?php echo "$emailstr";?></p>
    <p><strong>address = </strong><?php echo "$addstr";?></p>
    <p><strong>sport = </strong><?php echo "$sportstr";?></p>
    <p><strong>Mailing list = </strong><?php echo "$listcheck";?></p>

</body>

</html>