<?php
require 'include/init.php';

$query = "SELECT * FROM product";
$result = $db->query($query);
if (false == $result) {
    echo "Error";
    echo $query . "<BR>";
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
<a href="add2.php">Add Product</a>
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
        $query = "SELECT title FROM category INNER JOIN product_category ON category.id=category_id  WHERE product_id=$product[id]";
        $result = $db->query($query);
        $cats = [];
//        var_dump($result->fetch_all());
//        foreach ($result->fetch_all() as $category) {
//            $cats[] = $category[0];
//        }


        $cats = array_map(function($a){
            return $a[0];
        }, $result->fetch_all());


        $categories = implode(', ', $cats);

//        var_dump($categories);
        echo "<tr>
                <td>$i</td>
                <td>$product[title]</td>
                <td>$product[price]</td>
                <td>$categories</td>
          </tr>

";
        $i++;
    }
    ?>
</table>
</body>
</html>