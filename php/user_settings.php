<?php
session_start();
require './db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];

$avatar = file_get_contents($_FILES['avatar']['tmp_name']);
$type = $_FILES['avatar']['type'];

$avatar = base64_encode($avatar);

update(
     'UPDATE users SET name=:name, surname=:surname, patronymic=:patronymic, avatar=:avatar, type=:type WHERE id = :id',
    [
        'name'=>$name,
        'surname'=>$surname,
        'patronymic'=>$patronymic,
        'avatar'=>$avatar,
        'type'=>$type,
        'id'=>$_SESSION['user_id']
]
);
    header('Location: ../pages/profile.php?id='.$_SESSION['user_id']);