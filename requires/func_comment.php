<?php

require_once "requires/connect.php";
//function clear(){
//    foreach ($_POST as $key => $value) {
//        $_POST[$key] = mysqli_real_escape_string($value);
//    }
//}


function save_mess($link){
//    clear();
//    extract($_POST);
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $text = mysqli_real_escape_string($link, $_POST['text']);

    $query = "INSERT INTO comment (id_product, user_name, email, email_flag, status_comment, text, date) VALUES (".$_POST['id_product'].", '$name', '$email', ".$_POST['notas'].", 0, '$text', CURRENT_TIMESTAMP);";
    mysqli_query($link,$query);
}

function get_mess($link,$first, $itemsPerPage, $id_product){

    $query = "SELECT * FROM comment WHERE id_product = ".$id_product." AND status_comment = 1 ORDER BY id DESC LIMIT $first, $itemsPerPage";
    $res = mysqli_query($link,$query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_cout($link){
    $query = "SELECT COUNT(id) FROM comment";
    $rez = mysqli_query($link,$query);
    $row = mysqli_fetch_row($rez);
    return $row[0];
}

function print_arr($arr){
    echo "<pre>" . print_r($arr, true) . "</pre>";
}

