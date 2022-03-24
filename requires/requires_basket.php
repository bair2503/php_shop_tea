<?php session_start();

if(isset($_SESSION['cart_list'])){
    echo "Корзина:" . count($_SESSION['cart_list']) . "товара";
}

require "requires/connect.php";

if (isset($_GET['id']) ) {
    $query = "SELECT * FROM tea WHERE id=" . $_GET['id'];

    $red = mysqli_query($link, $query);
    $product = mysqli_fetch_assoc($red);

    if(empty($product)){
        header("Location; 404.php");
    }
}
