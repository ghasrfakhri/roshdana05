<?php
require 'include/init.php';

$query = "SELECT p.*, c.title as category_title FROM product as p LEFT JOIN category as c ON p.category_id=c.id";
$result = $db->query($query);
if (false == $result) {
    echo "Error";
    echo $query."<BR>";
    echo $db->error;
    exit;
}

$products = $result->fetch_all(MYSQLI_ASSOC);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="add.php">Add Product</a>
<table>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Price</th>
        <th>Category</th>
    </tr>

    <?php
    $i = 1;
    foreach ($products as $product) {
//var_dump($product);

        echo "<tr>
                <td>$i</td>
                <td>$product[title]</td>
                <td>$product[price]</td>
                <td>$product[category_title]</td>
          </tr>

";
        $i++;
    }
    ?>
</table>
</body>
</html>