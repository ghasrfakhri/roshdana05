<?php
require 'include/init.php';

if (isPostMethod()) {
    $title = $_REQUEST['title'];
    $price = (int)$_REQUEST['price'];
    $categoryId = (int)$_REQUEST['category_id'];
    $query = "INSERT INTO product SET title='$title', price=$price, category_id=$categoryId";
    $result = $db->query($query);
    if (false == $result) {
        echo "Error";
        echo $query."<BR>";
        echo $db->error;
        exit;
        exit;
    }
    redirectToUrl('index2.php');
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
        category: <select name="category_id">
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