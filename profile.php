<?php
session_start();
require "requires/user_id.php";?>



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
                <div class="home_title">Личный кабинет</div>
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
                        <?php
                        $flag = false;
                        require "requires/chek.php";
                        if($flag){
                        ?>
                        <form action="checkout.php" class="info" method="post">
                            <div class="cart_items">
                                <ul class="cart_items_list">
                                    <!-- Cart Item -->
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div><div class="product_number"></div></div>
                                            <div><div class="product_image"><img src="<?=$_SESSION['user']['avatar']?>" width="60" height="90" alt=""></div></div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="product.php"><?=$_SESSION['user']['full_name']?></a></div>

                                            </div>
                                        </div>
                                        <div class="product_size product_text"><span>email: <?=$_SESSION['user']['email']?></div>
                                        <div class="product_price product_text"><span>Price: </div>
                                        <div class="product_quantity_container" data-product>
                                            <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                <div class="product_text product_num">1</div>
                                                <div class="qty_sub qty_button trans_200 text-center" data-action="minus"><span>-</span></div>
                                                <div class="qty_add qty_button trans_200 text-center" data-action="plus"><span>+</span></div>

                                            </div>
                                        </div>
                                        <div class="product_total product_text"><span>Total: </span></div>
                                    </li>
                                </ul>
                            </div>
                            <?php  }
                            else
                            {
                                print "войти на сайт";
                            }

                            ?>
                            <!-- Cart Buttons -->
                            <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="button button_clear trans_200"><a href="exit.php" class="logout">выйти</a></div>
                                    <div class="button button_continue trans_200"><a href="index.php" >Продолжить покупку</a></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            </form>
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
<script src="js/prototype.js"></script>
<script src="js/add_cart.js"></script>
</body>
</html>