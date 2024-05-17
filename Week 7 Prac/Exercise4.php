<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Week 8 Exercise 4</title>
    <link rel="stylesheet" href=" ../css/week10Styles.css">
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
    $quantitynum = ($_POST["quantity"]);
    
    //inital check to determine if a positive number was input, no letters, special chars or negative numbers
    if(!is_numeric($quantitynum) || $quantitynum <=0) {
        echo"<p>The value entered for quantity was not a number</p>";
    }
    else {
    require_once ("conn.php");
    $quantitynum = intval($quantitynum);
    //intval is working here beecause we have the value and we are checking it server side

    $sql = "SELECT name, quantityInStock, price FROM product WHERE quantityInStock > $quantitynum";
    $results = $dbConn->query($sql)
        or die('Problem with query: ' . $dbConn->error);
    
    //An if statement will work here to determine if there is something to put into the table and then provide EITHER the table or error message
    ?>
    <?php 
    if ($results->num_rows > 0) {
    echo"<h1>Products with stock > $quantitynum</h1>";
    } else {
        echo "<h1>No products found with more than $quantitynum in stock</h1>";
    }
    ?>
    <table>
        <tr></tr>
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
         $dbConn->close();
        }
        //Made the mistake of having the db connection close here, error appeared in browser, telling me which line. easy troubleshoot to move it into the
        //correct spot within the else statement to close the connection correctly
        }
        ?>
    </table>
</body>

</html>