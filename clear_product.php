<?php
require "requires/connect.php";
$id= $_GET['product_id'];
$query='SELECT id FROM basket WHERE user_id="'.$_COOKIE['user_id'].'" AND id_product='.$id;
$result = $link->query($query);
if($result->num_rows>0) {
    $row = $result->fetch_row();
    $query = 'DELETE FROM basket WHERE id=' . $row[0];
}
$result=$link->query($query);
$query='SELECT COUNT(id) FROM basket WHERE user_id =  "'.$_COOKIE['user_id'].'"';
$result=$link->query($query);
$row=$result->fetch_row();
echo $row[0];
?>