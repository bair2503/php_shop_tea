<!DOCTYPE html>
<html lang="en">
<head>
    <title>Покупка</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>
<?php require "blocks_header_footer/header.php";
require "requires/connect.php";
$timestamp = date('Y-m-d H:i:s');
$query = "INSERT INTO orders_info (data_orders ,user_id, status_order )  VALUES ('$timestamp',".$_COOKIE['id'].", 0)";
$result = mysqli_query($link, $query);
$order_id = $link -> insert_id;

foreach ($_POST['basket'] as $prod){
    $tea_id = $prod[0];
    $tea_col = $prod[1];
    $query = "SELECT price FROM tea WHERE id=".$tea_id;
    $result = mysqli_query($link, $query);
    $row = $result -> fetch_row();
    $tea_price = $row[0];
    $query = "INSERT INTO order_items (id_order , id_product, col_product, price) VALUES ($order_id, $tea_id,$tea_col, $tea_price)";
    mysqli_query($link,$query);

}


?>

<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title">Ваш заказ оформлен</div>
            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li>Ваш номер заказа 0001</li>
                </ul>
            </div>

            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li><a href="index.php">Главная</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Checkout -->


<?php require "blocks_header_footer/footer.php"?>
</div>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>