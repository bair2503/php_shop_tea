<?php
session_start();
require "../requires/connect.php";

$_SESSION['field']['full_name'] = $_POST['product'];
$_SESSION['field']['login'] = $_POST['name_product'];
$_SESSION['field']['status_product'] = $_POST['status_product'];
$_SESSION['field']['sela_product'] = $_POST['sela_product'];
$_SESSION['field']['category_product'] = $_POST['category_product'];
$_SESSION['field']['wight'] = $_POST['wight'];
$_SESSION['field']['price'] = $_POST['price'];
$_SESSION['field']['text'] = $_POST['text'];


$product = $_POST['product'];
$name_product = $_POST['name_product'];
$status_product= $_POST['status_product'];
$sela_product = $_POST['sela_product'];
$category_product= $_POST['category_product'];
$weight=$_POST['wight'];
$price=$_POST['price'];
$text = $_POST['text'];
$errors = false;

if(!empty($_FILES['file1'])){
    $path1 = '/img/'. time(). $_FILES['file1']['name'];
    if(!move_uploaded_file($_FILES['file1']['tmp_name'], '../'. $path1)){
        echo 'файл не загрузился';
    }
}
if(!empty($_FILES['file2'])){
    $path2 = '/img/'. time(). $_FILES['file2']['name'];
    if(!move_uploaded_file($_FILES['file2']['tmp_name'], '../'. $path2)){
        echo 'файл не загрузился';
    }
}

$result = $link->query("SELECT id FROM tea WHERE  = '$name_product'");
if (mysqli_num_rows($result) != 0) {
    $errors = true;
}
if (!preg_match()) {
    if (strlen($_SESSION['message']) != 0)
    $errors = true;
}

if (strlen($_POST['product']) < 3 or strlen($_POST['product']) > 30) {
    if (strlen($_SESSION['message']) != 0)
    $errors = true;
}

if (!$errors) {
  $query=mysqli_query($link, "INSERT INTO `tea`(`id`, `name_page`, `name`, `status`, `sale`, `imgFile`, `description`, `category`, `product_weight`, `second_photo`) VALUES (NULL, '$product', '$name_product', '$status_product', '$sela_product', '$path1', '$text', '$category_product', '$weight', '$path2')");
  $tea_id=$link->insert_id;
    $query1="INSERT INTO `tea_weight`(`id`, `tea_id`, `weight`, `price`) VALUES (NULL, '$tea_id','$weight','$price')";
  $result = mysqli_query($link, $query1);
  echo $query1;


}
?>





    $_SESSION['message'] = 'Продукт добавлен!';}
//   header('Location:../admin/product.php');
//} else
//    header('Location:../admin/add_productquery.php');
