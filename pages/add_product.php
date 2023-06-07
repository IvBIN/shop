<?php
session_start();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление товара</title>
</head>
    <body>
        <form action="../php/add_product.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Название товара:" required>
            <textarea name="desc" id="" cols="40" rows="15" placeholder="Напишите описание" required></textarea>
            <input type="number" name="price" placeholder="Укажите цену:" required>
            <input type="number" name="count" placeholder="Укажите количество товара:" required>
            <input type="file" name="cover" required>
            <input type="submit" value="Добавить товар">
        </form>
        <style>
            form{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 15px;

            }
            textarea {

            }
        </style>
    </body>
</html>
