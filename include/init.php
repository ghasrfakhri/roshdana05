<?php
$db = new mysqli('localhost', 'root', '', 'roshdana05');

function isPostMethod()
{
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function redirectToUrl($url)
{
    header("Location: $url");
    exit;
}