<?php
session_start();
require './db.php';
$title = $_POST['title'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$count = $_POST['count'];
$cover = file_get_contents($_FILES['cover'] ['tmp_name']);

insert(
    'INSERT INTO products (title, description, price, count, cover)
    VALUES (:title, :desc, :price, :count, :cover)',
    [
        'title' => $title,
        'desc' => $desc,
        'price' => $price,
        'count' => $price,
        'cover' => base64_encode($cover)
    ]
);
header('Location: ../pages/products.php');