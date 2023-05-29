<?php
session_start();
require 'db.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];
//var_dump($_POST);

if ($password != $password_repeat){
    $_SESSION['error'] = 'Пароли не совпадают';
    header('location: ../pages/reg.php');
}
$user = select('SELECT * FROM users WHERE login = :login',
    [
        'login'=>$login
    ]);
if (!empty($user)){
    $_SESSION['error'] = 'Пользователь уже существует';
    header('location: ../pages/reg.php');
}
$hash = password_hash($password, PASSWORD_DEFAULT);
$user_id = insert(
    'INSERT INTO users (login, password) VALUES (:login, :password)',
    [
        'login' => $login,
        'password' => $hash
    ]
);
$_SESSION['user_id'] = $user_id;
header('location: ../');
