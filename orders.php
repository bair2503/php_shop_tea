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

<?php
require "requires/user_id.php";
require "blocks_header_footer/header.php";
require "requires/connect.php";
$timestamp = date('Y-m-d H:i:s');
$query = "UPDATE orders_info SET data_orders='$timestamp', user_id=".$_COOKIE['id'].", status_order='1', name='".$_POST['name']."', lastname='".$_POST['lastname']."', checkout_country='".$_POST['checkout_country']."', address='".$_POST['address']."', post_index='".$_POST['index']."', telephone='".$_POST['telephone']."', email='".$_POST['email']."', paymentmetod='".$_POST['paymentmetod']."'  WHERE id=".$_POST['order_id'] ;
echo $query.'<br>';
$result = mysqli_query($link, $query);
$order_id = $link -> insert_id;

?>

<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title">Ваш заказ оформлен </div>
            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li>Ваш номер заказа <?php echo $query?></li>
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