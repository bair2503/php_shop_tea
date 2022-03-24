<?php
session_start();
require '../requires/user_id.php';
require '../requires/connect.php';

$_SESSION['field']['full_name'] = $_POST['full_name'];
$_SESSION['field']['login'] = $_POST['login'];
$_SESSION['field']['email'] = $_POST['email'];



$full_name=$_POST['full_name'];
$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];
$errors = false;

    if ($password != $password_confirm) {
        $_SESSION['message'] = 'пароли не совпадают';
        $errors = true;
    }
        $path = 'img/avatar/' . time() . $_FILES['avatar']['name'];

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            if(strlen($_SESSION['message']) != 0)
                $_SESSION['message'].='<br />';
            $_SESSION['message'] .= 'Ошибка при загрузке';
            $errors = true;
        }
        $result= $link -> query("SELECT id FROM users WHERE login = '$login'");
        if (mysqli_num_rows($result)!=0){

            if(strlen($_SESSION['message']) != 0)
                $_SESSION['message'].='<br />';
            $_SESSION['message'] .= "Пользователь с таким логином";
            $errors = true;

        }
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
        {
            if(strlen($_SESSION['message']) != 0)
                $_SESSION['message'].='<br />';
            $_SESSION['message'] .= '"Логин может состоять только из букв английского алфавита и цифр"';
            $errors = true;
        }

        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
        {
            if(strlen($_SESSION['message']) != 0)
                $_SESSION['message'].='<br />';
            $_SESSION['message'] .= '"Логин должен быть не меньше 3-х символов и не больше 30"';
            $errors = true;
        }

if (!$errors) {
    $password = md5($password);
    mysqli_query($link, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `user_id`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path', '')");
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location:../login.php');
}else
    header('Location:../registration.php');
