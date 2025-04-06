<?php
require "./requires/connect.php";
function generateCode($length=15) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

$flag = false;
if (isset($_COOKIE['id']) and isset($_COOKIE['user_id']))
{
    require "./requires/connect.php";
    $timestamp = date('Y-m-d H:i:s');
    $query = "UPDATE  user_id SET data ='$timestamp' WHERE user_id = '".$_COOKIE['user_id']."'";
    mysqli_query($link,$query);
} else
    {
    require_once "./requires/connect.php";
    $user_id = generateCode($length=15);
    $timestamp = date('Y-m-d H:i:s');
    $query = "INSERT INTO user_id (user_id, data) VALUES ('$user_id', '$timestamp')";
    $result=mysqli_query($link, $query);
    setcookie("user_id", $user_id, time()+60*60*24*30, "/");
    setcookie("id", $link->insert_id, time()+60*60*24*30, "/", null, null, true);
}

