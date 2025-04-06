<?php
session_start();
require "./requires/connect.php";
require "./requires/user_id.php";
$_SESSION['user']=false;
setcookie("user_id", "", time() - 3600);
header('Location: login.php');
?>