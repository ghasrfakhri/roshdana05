<?php
require '../include/init.php';


$parentId = (int)($_GET['parent_id'] ?? 0);
if (isPostMethod()) {
    $title = $db->real_escape_string($_REQUEST['title']);
    addCategory($parentId, $title);
    redirectToUrl("index.php?parent_id=$parentId");
}


$categories = getCategories($parentId, false);
$category = getCategory($parentId);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?parent_id=<?= $category['parent_id'] ?>">&lt;Back</a>
<h1><?= $category['title'] ?></h1>

<form method="post">
    <label>
        Title: <input type="text" name="title">
    </label><br>
    <input type="submit" value="Save">
</form>

</body>
</html>
