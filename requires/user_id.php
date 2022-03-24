<?php

session_start();
function generateCode($length=15) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}


$falg = false;
if (isset($_COOKIE['id']) and isset($_COOKIE['user_id'])) {
    require "connect.php";
    $timestamp = date('Y-m-d H:i:s');
    $query = mysqli_query($link, "UPDATE  user_id SET data ='$timestamp'   WHERE user_id =  '" . $_COOKIE['user_id'] . "'");

} else {
    require "connect.php";
    $user_id = generateCode($length=15);
    $timestamp = date('Y-m-d H:i:s');
    mysqli_query($link, "INSERT INTRO user_id (user_id, date) VALUES ('$user_id', '$timestamp')");
    setcookie("id", 0, time()+60*60*24*30, "/");
    setcookie("user_id", $_SESSION['user']['user_id'], time()+60*60*24*30, "/", null, null, true);
}

