<?php
function getCategories($parentId = 0, $recursive = true)
{
    global $db;
    $query = "SELECT * FROM category WHERE parent_id=$parentId";
    $result = $db->query($query);
    if (false == $result) {
        echo "Error";
        exit;
    }

    $categories = $result->fetch_all(MYSQLI_ASSOC);

    if ($recursive) {
        foreach ($categories as $key => $category) {
            $category['subCategories'] = getCategories($category['id']);
            $categories[$key] = $category;
        }
    }
    return $categories;
}

function addCategory($parentId, $title)
{
    global $db;
    $query = "INSERT INTO category SET parent_id=$parentId, title='$title'";
    $result = $db->query($query);
    if (false == $result) {
        echo "Error";
        exit;
    }

    return $db->insert_id;
}

function getCategory($id)
{
    global $db;
    $query = "SELECT * FROM category WHERE id=$id";
    $result = $db->query($query);
    if (false == $result) {
        echo "Error";
        exit;
    }

    return $result->fetch_assoc();
}

function createOptions($categories, $prepend = '')
{
    foreach ($categories as $category) {
        echo "<option value='$category[id]'>$prepend $category[title]</option>";
        createOptions($category['subCategories'], $prepend . '--');
    }
}
