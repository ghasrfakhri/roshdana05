<?php
require 'include/init.php';

$query = "SELECT * FROM product";
$result = $db->query($query);
if (false == $result) {
    echo "Error";
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

        $query = "SELECT title FROM category WHERE id=$product[category_id]";
        $result = $db->query($query);
        $category = $result->fetch_assoc();
//


        echo "<tr>
                <td>$i</td>
                <td>$product[title]</td>
                <td>$product[price]</td>
                <td>$category[title]</td>
          </tr>

";
        $i++;
    }
    ?>
</table>
</body>
</html>