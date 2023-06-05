<?php
session_start();
require './db.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login)){
    if(!empty($password)){
       $user = select('SELECT * FROM users WHERE login = :login', ['login' => $login]);
       if(!empty($user)){
           if (password_verify($password, $user[0]['password'])){
               $_SESSION['user_id'] = $user[0]['id'];
           } else{
               $_SESSION['error'] = 'Пароль не правильный!';
           }
       } else{
           $_SESSION['error'] = 'Такого пользователя не существует!';
       }
    } else{
        $_SESSION['error'] = 'Поле пароль не может быть пустым!';
    }
} else{
    $_SESSION['error'] = 'Поле логин не может быть пустым!';
}
header('Location: ../pages/profile.php?id='.$user[0]['id']);