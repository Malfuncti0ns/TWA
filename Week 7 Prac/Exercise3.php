<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Week 8 Exercise 3</title>
    <link rel="stylesheet" href=" ../css/week10Styles.css">
</head>

<body>
    <?php
    require_once ("conn.php");
    $sql = "SELECT name, quantityInStock, price FROM product WHERE quantityInStock > 10";
    $results = $dbConn->query($sql)
        or die('Problem with query: ' . $dbConn->error);
    ?>
    <h1>Products with stock > 10.</h1>
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
        $dbConn->close(); ?>
    </table>
</body>

</html>