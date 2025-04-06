<?php
require "requires/connect.php";
require "requires/user_id.php";
$id= $_GET['product_id'];
$weight = $_GET['weight'];
$query='SELECT id FROM basket WHERE user_id="'.$_COOKIE['user_id'].'" AND id_product='.$id.' AND weight='.$weight;
$result = $link->query($query);
if($result->num_rows>0){
    $row=$result->fetch_row();
    $query='UPDATE basket SET col_product=col_product -1> 1 WHERE id='.$row[0];
    $result1=$link->query($query);
}
$query='SELECT COUNT(id) FROM basket WHERE user_id =  "'.$_COOKIE['user_id'].'"';
$result=$link->query($query);
$row=$result->fetch_row();
$row[0];
?>