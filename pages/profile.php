<?php
session_start();
require '../php/db.php';

$user = select('SELECT * FROM users WHERE id = :id', ['id' => $_GET['id']]);
$item = select('SELECT * FROM cart WHERE id_user = :id', ['id' => $_GET['id']]);
var_dump($item);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles/profile.css">
    <title>Профиль</title>
</head>
<body>
    <?php require '../moduls/header.php'?>
    <div class="container">
        <div class="user">
            <div class="avatar">
                <img src="data:<?= $user[0]['type']?>;base64, <?=$user[0]['avatar']?>" alt="avatar">
            </div>
            <div class="user_info">
                <h2><?php echo $user[0]['surname']; echo ' '.$user[0]['name']; echo ' '.$user[0]['patronymic']; ?></h2>
                <span>ID: <?php echo $user[0]['id']; ?></span>
            </div>
            <?php if ($_GET['id'] ==$_SESSION['user_id']){?>
            <div class="user_settings">
                <a href="./user_settings.php">Настройки</a>
                <form action="../php/exit.php" method="post">
                    <input type="submit" value ='Выход'>
                </form>
            </div>
            <div class="cart">
                <?php if (!empty($item)){
                    foreach ($item as $prod){
                        echo select('SELECT title FROM products WHERE id = :item_id', ['item_id'=>$prod['id_item']])[0]['title'];
                        echo ' - ';
                        echo select('SELECT price FROM products WHERE id = :item_id', ['item_id'=>$prod['id_item']])[0]['price'] . '<br>';
                    }
                }?>

            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
