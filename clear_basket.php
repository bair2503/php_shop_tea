<?php
session_start();
require "requires/connect.php";
$id = $_GET['product_id'];
$errors = false;
if(!$errors) {
    $query = 'DELETE FROM basket WHERE user_id =  "' . $_COOKIE['user_id'] . '"';
$result = $link->query($query);
echo($result);
$_SESSION['message'] = 'Корзина пуста';
    header('Location:../cart.php');
}
else
    header('Location:../cart.php');
?>
