<?php
session_start();
require '../php/db.php';
$user = select('SELECT * FROM users WHERE id = :id', ['id' => $_SESSION['user_id']]);
?>
<form action="../php/user_settings.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Введите ваше имя" value="<?php echo  $user[0]['name']?>"><br>
    <input type="text" name="surname" placeholder="Введите вашу фамилию" value="<?php echo  $user[0]['surname']?>"><br>
    <input type="text" name="patronymic" placeholder="Введите ваше отчество" value="<?php echo  $user[0]['patronymic']?>"><br>
    <input type="file" name="avatar"><br>
    <input type="submit" value="Сохранить изменения">
</form>
