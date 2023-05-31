<?php
session_start()
?>

<form action="../php/reg.php" method="post">
    <span class="error"><?php echo  $_SESSION['error']; unset($_SESSION['error'])?></span><br>
    <input type="text" name="login" placeholder="Придумайте логин:"><br>
    <input type="password" name="password" placeholder="Придумайте пароль:"><br>
    <input type="password" name="password_repeat" placeholder="Повторите пароль:"><br>
    <input type="submit" value="Зарегистрироваться">
</form>
<a href="./auth.php">Авторизация</a>
