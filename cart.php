<?php
session_start();

require "requires/user_id.php";
require "requires/connect.php";

if(!empty($_POST['update'])) {
    $query = "SELECT basket.id, tea.id,  col_product,  tea.name FROM basket JOIN tea ON id_product = tea.id WHERE user_id = ' " . $_SESSION['user_id'] . "'";
    $red = mysqli_query($link, $query);
    $cart = $_POST['cart'];
    while ($row = mysqli_fetch_row($red)) {
        if ($row[3] != $cart [$row[0]]) {

            if ($_POST['cart'][$row[0]]!= 0) {
                $query2 = "UPDATE basket SET col_product=" . $cart[$row[0]] . " WHERE id = " . $row[0];
                $result2 = mysqli_query($link, $query2);
            }
            else {
                $query2 = "DELETE FROM basket WHERE id= ".$row[0];
                $result2 = mysqli_query($link, $query2);

            }
        }
    }
}
$query = "SELECT basket.id, tea.id, tea.price, col_product, category, imgFile,  tea.name FROM basket JOIN tea ON id_product = tea.id WHERE user_id = ' ".$_SESSION['user_id']."'";
$red = mysqli_query($link, $query);
?>

<! DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>
<body>
<?php require "blocks_header_footer/header.php"?>
<div class="super_container_inner">
    <div class="super_overlay"></div>
    <!-- Home -->
    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title">Корзина</div>
                <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                    <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                        <li><a href="index.php">Продолжить покупку</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart -->




            <div class="cart_section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="cart_container">
                                <!-- Cart Bar -->
                                    <div class="cart_bar">
                                        <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                            <li class="mr-auto">Продукт</li>
                                            <li>Категория</li>
                                            <li>Цена</li>
                                            <li>Количество</li>
                                            <li>Итого</li>

                                        </ul>
                                    </div>
                                            <!-- Cart Items -->
                                <form action="" class="info" method="post">
                                    <?php
                                    $sumproduct=0;
                                    $n=0;
                                    while ($row = mysqli_fetch_row($red)){
                                        $sumproduct = $row[2] * $row[3];
                                        $n++;
                                        ?>
                                            <div class="cart_items">
                                                <ul class="cart_items_list">
                                                    <!-- Cart Item -->
                                            <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                                <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">

                                                    <div><div class="product_image"><img src="img/<?php echo $row[5] ?>.jpg" alt=""></div></div>
                                                    <div class="product_name_container">
                                                        <div class="product_name"><a href="product.php"><?php echo $row[6]?></a></div>

                                                    </div>
                                                </div>
                                                <div class="product_size product_text"><span>Size: </span><?php echo $row[4]?></div>
                                                <div class="product_price product_text"><span>Price: </span><?php echo $row[2]?></div>
                                                <div class="product_quantity_container">
                                                    <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                        <span class="product_text product_num"><?php echo $row[3]?></span>
                                                        <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                                                        <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>


                                                    </div>
                                                </div>
                                                <div class="product_total product_text"><span>Total: </span><?php echo $row[2]* $row[3]?></div>
                                            </li>
                                        </ul>
                                    </div>
                                <?php }?>
                                    <!-- Cart Buttons -->
                                    <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                        <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                            <div class="button button_clear trans_200"><a href="cart.php">очистить корзину</a></div>
                                            <div class="button button_continue trans_200"><a href="index.php" >Продолжить покупку</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row cart_extra_row">
                            <div class="col-lg-6">
                                <div class="cart_extra cart_extra_1">
                                    <div class="cart_extra_content cart_extra_coupon">
                                        <div class="coupon_text"></div>
                                        <div class="shipping">
                                            <div class="cart_extra_title">Способ Доставки</div>
                                            <ul>
                                                <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                    <label class="radio_container">
                                                        <input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio" value="0">
                                                        <span class="radio_mark"></span>
                                                        <span class="radio_text">Быстрая Доставка</span>
                                                    </label>
                                                    <div class="shipping_price ml-auto">900&#8381</div>
                                                </li>
                                                <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                    <label class="radio_container">
                                                        <input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio" value="1">
                                                        <span class="radio_mark"></span>
                                                        <span class="radio_text">Доставка</span>
                                                    </label>
                                                    <div class="shipping_price ml-auto">400&#8381</div>
                                                </li>
                                                <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                    <label class="radio_container">
                                                        <input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" value="3" checked>
                                                        <span class="radio_mark"></span>
                                                        <span class="radio_text">Самовывоз</span>
                                                    </label>
                                                    <div class="shipping_price ml-auto">Бесплатно</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 cart_extra_col">
                                <div class="cart_extra cart_extra_2">
                                    <div class="cart_extra_content cart_extra_total">
                                        <div class="cart_extra_title">Всего в корзине</div>
                                        <ul class="cart_extra_total_list">
                                            <li class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="cart_extra_total_title">Итого</div>
                                                <div class="cart_extra_total_value ml-auto"><?php echo $sumproduct;?> руб.</div>
                                            </li>
                                            <li class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="cart_extra_total_title">Доставка</div>
                                                <div class="cart_extra_total_value ml-auto">Стандартный</div>
                                            </li>
                                            <li class="d-flex flex-row align-items-center justify-content-start">
                                                <div class="cart_extra_total_title">Всего</div>
                                                <div class="cart_extra_total_value ml-auto"><?php echo $sumproduct;?> руб.</div>
                                            </li>
                                        </ul>

                                        <div class="checkout_button trans_200"><a href="orders.php">Оформление заказа</a></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>




<?php require "blocks_header_footer/footer.php"?>

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
<script src="js/cart.js"></script>
</body>
</html>