<?php //session_start();
//
//if(isset($_SESSION['cart_list'])){
//    echo "Корзина:" . count($_SESSION['cart_list']) . "товара";
//}
//require_once "connect.php";
//$query = "SELECT * FROM tea";
//$red = mysqli_query($link, $query);
//$data_from_db = [];
//
//while ($result = mysqli_fetch_assoc($red)){
//    $data_from_db[] = $result;
//}
//?>

<! DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>herbs</title>
</head>
<body>
<?php require "block/header.php"?>

<div class="container mt-5">

    <div class="d-flex flex-wrap">
        <?php
        require "connectadmin.php";
        $query = "SELECT * FROM herbs";
        $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_row($result)){
            ?>
            <div class="card mb-5 rounded-3 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal"><?php echo $row[2]?></h4>
                </div>
                <div class="card-body" style="position: relative">
                    <img src="img/<?php echo $row[6] ?>.jpg" class="img-fluid" alt="">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li style="font-family:ARIAL BLACK" ><?php echo $row[4]?>&#8381</li>
                        <li><?php echo $row[7] ?></li>
                    </ul>
                    <a href="product.php/<?php echo $row[1]?>"><button type="button" class=" btn-bottom btn btn-lg btn-block btn-outline-primary ">В Корзину</button></a><br>

                </div>
            </div>
        <?php }?>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src = "js/main.js"></script>
</body>
</html>

