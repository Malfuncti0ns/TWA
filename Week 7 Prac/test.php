<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style>
        input[type="text"] {
            border: 1px solid black;
        }
    </style>
    <link rel="stylesheet" href="../css/week10Styles.css">
    <title>Week 10 Exercise 4 Form</title>
</head>

<body>
    <form id="exercise5Form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <!--Using PHP_SELF as per last weeks exercise to refer back to its own input within the page and stops loading into exercise4.php-->
        <h1>Quantity in Stock</h1>
        <p>Please enter the quantity to check against stock levels</p>
        <p>
            <label for="quantity">Quantity: </label>
            <input type="text" name="quantity" size="10" id="quantity" maxlength="6">
        </p>
        <p><input type="submit" name="submit"></p>
    </form>
    
    <?php
    if (isset($_POST["submit"])) {
        $quantitynum = ($_POST["quantity"]);

        //inital check to determine if a positive number was input, no letters, special chars or negative numbers
        if (!is_numeric($quantitynum) || $quantitynum <= 0) {
            echo "<p>The value entered for quantity was not a number</p>";
        } else {
            require_once ("conn.php");
            $quantitynum = intval($quantitynum);
            //intval is working here beecause we have the value and we are checking it server side
    
            $sql = "SELECT name, quantityInStock, price FROM product WHERE quantityInStock > $quantitynum";
            $results = $dbConn->query($sql)
                or die('Problem with query: ' . $dbConn->error);

            //An if statement will work here to determine if there is something to put into the table and then provide EITHER the table or error message
            if ($results->num_rows > 0) {
                echo "<h1>Products with stock > $quantitynum</h1>";
                ?>
                <table>
                    <tr>
                        <th>Name </th>
                        <th>Quantity In Stock</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    while ($row = $results->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["name"] ?></td>
                            <!-- output the other fields here from the $row array -->
                            <td><?php echo $row["quantityInStock"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                        </tr>
                    <?php }
                    ?>
                </table>
            <?php } else {
                echo "<p>No products found with more than $quantitynum in stock</p>";
            }
            $dbConn->close();
        }
        //Made the mistake of having the db connection close here, error appeared in browser, telling me which line. easy troubleshoot to move it into the
        //correct spot within the else statement to close the connection correctly
    }
    ?>
    </table>

</body>

</html>
