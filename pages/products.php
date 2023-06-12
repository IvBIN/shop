<?php
session_start();
require '../php/db.php';
$products = select('SELECT * FROM products');

?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../assets/styles/products.css">
        <title>Все товары</title>

    </head>
    <body>
        <?php require '../moduls/header.php'?>

        <div class="container">
            <?php foreach ($products as $product): ?>
                <div class="item">
                    <img src="data:image/jpeg;base64,<?php echo $product['cover']?>" alt="">
                    <h3><?php echo $product['title']?></h3>
                    <p><?php echo $product['description']?></p>
                    <div class="more">
                        <span><?php echo $product['price']?></span>
                        <a href="./item.php?id=<?php echo $product['id']?>">Узнать больше</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </body>
</html>

