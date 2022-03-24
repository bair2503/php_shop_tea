<?php
session_start();
require '../requires/connect.php';

    $login=$_POST['login'];
    $password = md5($_POST['password']);

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login`= '$login' AND `password`= '$password' ");
    if (mysqli_num_rows($check_user) >0){

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "user_id" => generateCode($length=15),
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email']
        ];
        mysqli_query($link, "UPDATE users SET user_id='".$_SESSION['user']['user_id'] ."' WHERE id='".$_SESSION['user']['id']."'" );
        setcookie("id", $_SESSION['user']['id'], time()+60*60*24*30, "/");
        setcookie("user_id", $_SESSION['user']['user_id'], time()+60*60*24*30, "/", null, null, true);
        header('Location: ../profile.php');
    } else {
        $_SESSION['message'] = 'Не верный пароль или логин';
        header('Location: ../login.php');
    }