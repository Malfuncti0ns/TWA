<!DOCTYPE html>
<html lang="en">
<!--Matthew Chiandotto 17800541-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Tracker</title>
    <link rel="stylesheet" href="../project/css/project_master.css">
    <script type="text/javascript" src="../project/javascript/project_Script.js"></script>
</head>

<body>
    <a href="Index.php"><img class="banner" src="../project/images/logo.png" alt="Function Tracker Logo"></a>
    <!--Image created using the website Looka https://looka.com/ 
    I wanted something that was a bit unique to my assignment and this allowed me to input
    a bit more information and get something simple and clean. Working on the sizing as it feels a bit too tall at the moment
    -->
    <div class="Navigation">
        <a href="Registration.php">New User Registration</a>
        <a href="Login_form.php">Login</a>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $date = date("d-m-Y H:i:s");
            echo "<a>Hello {$_SESSION['first_name']} todays date is $date </a>";
        }
        ?>
        <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='Last_Login.php'>Logout</a>";
        }
        ?>
        <!--The idea here is to have a banner up the top or top left depending on size, then under it and along the page
        have each link in it's part along the top of the page, login at the end and index at the start with if I can get it working will only appear
        when a user has logged in otherwise push a DOM message when hitting the page as a guest to push back to index, registration or login-->

        <!--Previously had multiple pages here but re-reading assignment details removed the pages that should only been seen post login, running as html
        on my vscode but note that I'll need to set a session for login for the other pages to show the correct links but this could be a new page?-->
    </div>
    <div class="fillcontent">
        <div class="left">
            <p>
                Sed at mi viverra mauris vehicula tempor non at magna. Phasellus euismod purus id venenatis convallis.
                Maecenas porta efficitur nisl, molestie convallis dui condimentum non. Nam a nisl vel tortor accumsan
                congue. Quisque et felis lacinia, posuere diam ut, auctor justo. Nullam pretium pellentesque tellus, non
                pulvinar turpis pulvinar in. Phasellus eget nibh sed odio ultrices cursus et eu felis. Donec tincidunt
                nisi
                in metus faucibus tincidunt. Suspendisse tincidunt ipsum in iaculis fermentum. Pellentesque eget mi eu
                erat
                porta dictum. Cras mi arcu, hendrerit eu vestibulum a, ornare nec diam. Mauris vel arcu massa. Cras
                lobortis
                magna id eleifend tincidunt. Etiam rhoncus nunc sapien. Suspendisse dictum odio nec ante gravida, ut
                malesuada orci blandit. Curabitur non mi efficitur, cursus mi sit amet, bibendum tellus.
            </p>
        </div>
        <div class="center">
            <p>
                Sed at mi viverra mauris vehicula tempor non at magna. Phasellus euismod purus id venenatis convallis.
                Maecenas porta efficitur nisl, molestie convallis dui condimentum non. Nam a nisl vel tortor accumsan
                congue. Quisque et felis lacinia, posuere diam ut, auctor justo. Nullam pretium pellentesque tellus, non
                pulvinar turpis pulvinar in. Phasellus eget nibh sed odio ultrices cursus et eu felis. Donec tincidunt
                nisi
                in metus faucibus tincidunt. Suspendisse tincidunt ipsum in iaculis fermentum. Pellentesque eget mi eu
                erat
                porta dictum. Cras mi arcu, hendrerit eu vestibulum a, ornare nec diam. Mauris vel arcu massa. Cras
                lobortis
                magna id eleifend tincidunt. Etiam rhoncus nunc sapien. Suspendisse dictum odio nec ante gravida, ut
                malesuada orci blandit. Curabitur non mi efficitur, cursus mi sit amet, bibendum tellus.

            </p>
        </div>
        <div class="right">
            <p>
                Sed at mi viverra mauris vehicula tempor non at magna. Phasellus euismod purus id venenatis
                convallis.
                Maecenas porta efficitur nisl, molestie convallis dui condimentum non. Nam a nisl vel tortor
                accumsan
                congue. Quisque et felis lacinia, posuere diam ut, auctor justo. Nullam pretium pellentesque tellus,
                non
                pulvinar turpis pulvinar in. Phasellus eget nibh sed odio ultrices cursus et eu felis. Donec
                tincidunt nisi
                in metus faucibus tincidunt. Suspendisse tincidunt ipsum in iaculis fermentum. Pellentesque eget mi
                eu erat
                porta dictum. Cras mi arcu, hendrerit eu vestibulum a, ornare nec diam. Mauris vel arcu massa. Cras
                lobortis
                magna id eleifend tincidunt. Etiam rhoncus nunc sapien. Suspendisse dictum odio nec ante gravida, ut
                malesuada orci blandit. Curabitur non mi efficitur, cursus mi sit amet, bibendum tellus.
            </p>
        </div>
        <!--Using 3 of the same paragaph to just create boxes of the same size and fill the page out, think of them as text explaining the images under each of them to
    sell the product that is Function Tracker-->
    </div>
    </div>
    <div class="IndexImages">
        <img src="images/image1.jpg" alt="Workout Image One">
        <img src="images/image2.jpg" alt="Workout Image Two">
        <img src="images/image3.jpg" alt="Workout Image Three">
        <!--Add 3 images here, left middle right of workouts and an example of the workout history page-->
        <!--Images obtained from https://dribbble.com/shots/20399574-Workout-Planner-App-->
    </div>

</body>

</html>