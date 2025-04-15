<?php
session_start();
require "requires/user_id.php";
if (isset($_SESSION['cart_list'])) {
    echo "Корзина:" . count($_SESSION['cart_list']) . "товара";
}
?>
<?php require "requires/connect.php";
if (!empty($_POST['update'])) {
    $query = "SELECT basket.id, tea.id,  col_product,  tea.name FROM basket JOIN tea ON id_product = tea.id WHERE user_id='" . $_COOKIE['user_id'] . "'";
    echo $query;
    $red = mysqli_query($link, $query);
    $cart = $_POST['cart'];
    while ($row = mysqli_fetch_row($red)) {
        if ($row[3] != $cart[$row[0]]) {

            if ($_POST['cart'][$row[0]] != 0) {
                $query2 = "UPDATE basket SET col_product=" . $cart[$row[0]] . " WHERE id = " . $row[0];
                $result2 = mysqli_query($link, $query2);
            } else {
                $query2 = "DELETE FROM basket WHERE id= " . $row[0];
                $result2 = mysqli_query($link, $query2);
            }
        }
    }
}
$query = "SELECT basket.id, tea.id, tea_weight.price, col_product, category, imgFile, tea.name, tea.name_page, tea_weight.weight FROM basket JOIN tea ON id_product = tea.id JOIN tea_weight ON tea_id=id_product AND tea_weight.weight=basket.weight  WHERE user_id='" . $_COOKIE['user_id'] . "'";
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
        <?php require "blocks_header_footer/header.php" ?>
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
                            <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                                <li><?php
                                    if ($_SESSION['message']) {
                                        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                                    }
                                    unset($_SESSION['message']);
                                    ?></li>
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
                                        <li>Вес</li>
                                        <li>Количество</li>
                                        <li class="col-1">Итого</li>
                                        <li></li>
                                    </ul>
                                </div>

                                <!-- Cart Items -->

                                <form action="checkout.php" class="info" method="post">
                                    <ul class="cart_items_list">
                                        <?php
                                        $sumproduct = 0;
                                        $n = 0;
                                        while ($row = mysqli_fetch_row($red)) {
                                            $sumproduct += $row[2] * $row[3];
                                            $n++;

                                            $total_quantity = 0;
                                            $query_quantity = "SELECT SUM(col_product) as total_qty FROM basket WHERE user_id='" . $_COOKIE['user_id'] . "'";
                                            $result_quantity = mysqli_query($link, $query_quantity);
                                            if ($row_quantity = mysqli_fetch_assoc($result_quantity)) {
                                                $total_quantity = $row_quantity['total_qty'];
                                            }
                                        ?>
                                            <div id="product<?php echo $row[1]; ?>" class="cart_items">
                                                <input type="hidden" name="basket[<?php echo $n - 1 ?>][0]" value="<?php echo $row[1] ?>">
                                                <!-- Cart Item -->
                                                <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                                    <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                                        <div>
                                                            <div id="product_id" class="product_number"><?php echo $row[0] ?></div>
                                                        </div>
                                                        <div>
                                                            <div class="product_image"><img src="<?php echo $row[5] ?>" width="60" height="90" alt=""></div>
                                                        </div>
                                                        <div class="product_name_container">
                                                            <div class="product_name"><a href="product.php/<?php echo $row[7]; ?>"><?php echo $row[6] ?></a></div>

                                                        </div>
                                                    </div>
                                                    <div class="product_size product_text"><span>Size: </span><?php echo $row[4] ?></div>
                                                    <div class="product_price product_text" name="product_price" id="<?php echo $row[0] ?>" onchange="change_price(<?php echo $row[0] ?>)"><span>Price: </span><span><?php echo $row[2] ?></span></div>
                                                    <div class="product_price product_text" id="<?php echo $row[0]; ?>"><span>Вес: </span><?php echo $row[8] ?></div>
                                                    <input type="hidden" name="basket[<?php echo $n - 1 ?>][2]" value="<?php echo $row[8] ?>">
                                                    <div class="product_quantity_container">
                                                        <div>
                                                            <input id="input_product<?php echo $row[1] . '_' . $row[8]; ?>" type="text" class="product_quantity ml-lg-auto mr-lg-auto text-center" onchange="col_Product(<?php echo $row[1] ?>)" name="basket[<?php echo $n - 1 ?>][1]" value="<?php echo $row[3] ?>">
                                                            <div id="minus" class="qty_sub qty_button trans_200 text-center" data-action="minus" onclick="minus_col(<?php echo $row[1] . ',' . $row[8] ?>)"><span>-</span></div>
                                                            <div id="plus" class="qty_add qty_button trans_200 text-center" data-action="plus" onclick="plus_col(<?php echo $row[1] . ',' . $row[8] ?>)"><span>+</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="product_total product_text"><?php echo $row[2] * $row[3] ?></div>
                                                    <div class="product_text product_num">
                                                        <div class="cl-btn-2" onclick="clear_product(<?php echo $row[1] ?>)">
                                                            <div class="cl-btn-2">
                                                                <div>
                                                                    <div class="leftright"></div>
                                                                    <div class="rightleft"></div>
                                                                    <span class="close-btn">удалить</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                        <?php } ?>
                                    </ul>
                                    <!-- Cart Buttons -->
                                    <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                        <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                            <div class="button button_clear trans_200"><a href="cart.php" onclick="clear_basket(<?php echo $row[0] ?>)">Очистить корзину</a></div>
                                            <div class="button button_continue trans_200"><a href="index.php">Продолжить покупку</a></div>
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
                                                    <span class="radio_text">Самовывоз (со Склада - Москва)</span>
                                                </label>
                                                <div class="shipping_price ml-auto">Бесплатно</div>
                                            </li>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio" value="1">
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Курьерская доставка по Москве внутри МКАД (по весу)</span>
                                                </label>
                                                <div class="shipping_price ml-auto">420&#8381</div>
                                            </li>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" value="3" checked>
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Доставка в пункт OZON (Только по предоплате) Оплата на сайте или по счёту. Вес до 5 кг. </span>
                                                </label>
                                                <div class="shipping_price ml-auto">420&#8381</div>
                                            </li>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_4" name="shipping_radio" class="shipping_radio" value="3" checked>
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Платная доставка СДЭК (расчет стоимости по весу после оформления заказа) от 250 рублей</span>
                                                </label>
                                                <div class="shipping_price ml-auto">194&#8381</div>
                                            </li>
                                            <li class="shipping_option d-flex flex-row align-items-center justify-content-start">
                                                <label class="radio_container">
                                                    <input type="radio" id="radio_5" name="shipping_radio" class="shipping_radio" value="3" checked>
                                                    <span class="radio_mark"></span>
                                                    <span class="radio_text">Индивидуальный расчет (за МКАД крупногабаритные заказы и другие особые условия) </span>
                                                </label>
                                                <div class="shipping_price ml-auto">0&#8381</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 cart_extra_col">
                            <div class="cart_extra cart_extra_2">
                                <div class="cart_extra_content cart_extra_total">
                                    <div class="cart_extra_title">Всего в корзине</div>
                                    <ul class="cart_extra_total_list">
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Товаров</div>
                                            <div class="cart_extra_total_value ml-auto"><?php echo $total_quantity ?> шт.</div>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title" id="selected_delivery">-</div>
                                            <input type="hidden" id="delivery_option" name="address" value="">
                                            <div class="cart_extra_total_value ml-auto"></div>
                                        </li>
                                        <li class="d-flex flex-row align-items-center justify-content-start">
                                            <div class="cart_extra_total_title">Всего</div>
                                            <div class="cart_extra_total_value ml-auto"><?php echo $sumproduct ?> руб.</div>
                                        </li>
                                    </ul>
                                    <input type="hidden" name="total_amount" value="<?php echo $sumproduct ?>">
                                    <input type="hidden" name="total_product" value="<?php echo $total_quantity ?>">
                                    <input class="checkout_button trans_200" type="submit" name="order" value="Оформить заказ">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>




        <?php require "blocks_header_footer/footer.php" ?>

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
        <script src="js/clear_basket.js"></script>
        <script src="js/clear_product.js"></script>
        <script src="js/plus_col.js"></script>
        <script src="js/minus_col.js"></script>
        <script src="js/col_product.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/search.js"></script>
        <script src="js/search_ajax.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/delivery.js"></script>
    </body>

    </html>