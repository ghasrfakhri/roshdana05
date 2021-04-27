<?php
require 'include/init.php';

//var_dump($_POST);

if (isPostMethod()) {
    $title = $_REQUEST['title'];
    $price = (int)$_REQUEST['price'];
    $categoriesId = $_REQUEST['category_id'];
    $query = "INSERT INTO product SET title='$title', price=$price";
    $result = $db->query($query);
    if (false == $result) {
        echo "Error";
        echo $query . "<BR>";
        echo $db->error;
        exit;
        exit;
    }
    $productId = $db->insert_id;

//    foreach ($categoriesId as $categoryId) {
//        $query = "INSERT INTO product_category (product_id, category_id) VALUES($productId,$categoryId)";
//        $result = $db->query($query);
//    }
    $queryValues = [];
    foreach ($categoriesId as $categoryId) {
        $queryValues[] = "($productId,$categoryId)";

    }



    $query = "INSERT INTO product_category (product_id, category_id) VALUES". implode(',',$queryValues);
    $result = $db->query($query);
    redirectToUrl('index3.php');
}



$query = "SELECT * FROM category";
$result = $db->query($query);
if (false == $result) {
    echo "Error";
    exit;
}

$categories = $result->fetch_all(MYSQLI_ASSOC);
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
<form method="post">
    <label>
        title: <input type="text" name="title">
    </label><br>
    <label>
        price: <input type="number" name="price">
    </label><br>
    <label>
        category: <select name="category_id[]" multiple>
            <?php
            foreach ($categories as $category) {
                echo "<option value='$category[id]'>$category[title]</option>";
            }
            ?>
        </select>
    </label><br>
    <input type="submit" value="Save">
</form>


</body>
</html>