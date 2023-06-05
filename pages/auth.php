<?php
session_start()
?>

<form action="../php/auth.php" method="post">
    <span class="error"><?php echo  $_SESSION['error']; unset($_SESSION['error'])?></span><br>
    <input type="text" name="login" placeholder="Введите логин:"><br>
    <input type="password" name="password" placeholder="Введите пароль:"><br>
    <input type="submit" value="Войти">
</form>
<a href="./reg.php">Регистрация</a>
