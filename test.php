<?php
$ar = [1, 2, 3, 4, 5];
$ar2 = array_map(function ($x) {
    return $x * 2;
}, $ar);

var_dump($ar);
var_dump($ar2);