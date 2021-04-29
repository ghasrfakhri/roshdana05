<?php
require '../include/init.php';

//if (isset($_GET['parent_id'])) {
//    $prentId = (int)$_GET['parent_id'];
//} else {
//    $prentId = 0;
//}

//$prentId = isset($_GET['parent_id']) ? (int)$_GET['parent_id'] : 0;

$prentId = (int)($_GET['parent_id'] ?? 0);

$categories = getCategories($prentId, false);
$category = getCategory($prentId);


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

<a href="add.php?parent_id=<?= $category['id'] ?>">Add</a>

<table>
    <tr>
        <th>#</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    $i = 1;
    foreach ($categories as $category) {
        echo "
            <tr>
                <td>$i</td>
                <td><a href='index.php?parent_id=$category[id]'>$category[title]</td>
                <td></td>
                
            </tr>
            ";
        $i++;
    }

    ?>


</table>
</body>
</html>
