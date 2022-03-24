<?php
session_start();

$flag = false;
if (isset($_COOKIE['id']) and isset($_COOKIE['user_id']))
{
    require "requires/connect.php";
    $query = mysqli_query($link, "SELECT id, user_id FROM users WHERE id = ".intval($_COOKIE['id'])." LIMIT 1");
    $userdata = mysqli_fetch_row($query);

    if(($userdata[1] != $_COOKIE['user_id']) or ($userdata[0] != $_COOKIE['id']))
    {

        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("user_id", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!

    }
    else
    {
        $flag = true;
    }
}
else
{
    require "blocks_header_footer/header.php";
    print "Включите куки";
    require "blocks_header_footer/footer.php";
}
?>


