<?php session_start();
require "requires/connect.php";
require "requires/user_id.php";
if (isset($_SESSION['cart_list'])) {
    echo "Корзина:" . count($_SESSION['cart_list']) . "товара";
}
?>
<?php
require "requires/connect.php";
if (!empty($_POST['add'])) {
    $id_product = $_POST['id_product'];
    $query1 = "SELECT user_id, col_product FROM basket WHERE id_product = " . $id_product . " AND user_id='" . $_COOKIE['user_id'] . "'";
    $result1 = mysqli_query($link, $query1);
    if (mysqli_num_rows($result1) != 0) {
        $row1 = mysqli_fetch_row($result1);
        $query2 = "UPDATE basket SET col_product=" . ($row1[1] + 1) . " WHERE id = " . $row1[0];
        $result2 = mysqli_query($link, $query2);
    } else {
        $query2 = "INSERT INTO basket (id_product,user_id, col_product VALUES (" . $id_product . ", '" . $_COOKIE['user_id'] . "', 1)";
        $result2 = mysqli_query($link, $query2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Baigaliin Luu</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/search.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

</head>


<?php require "blocks_header_footer/header.php" ?>

<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <!-- Home Slider -->
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url(img/fon.jpg)"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Новинки</div>
                                        <div class="home_subtitle">Чая</div>
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side"><a href="product.php/"><img src="img/1.jpg" alt=""></a></div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>от</div>
                                                                <div>200<span>&#8381</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product_image"><img src="img/2.jpg" alt=""></div>
                                                        <div class="product_content">
                                                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                <div>
                                                                    <div>
                                                                        <div class="product_name"><a href="product.php">Cool Clothing with Brown Stripes</a></div>
                                                                        <div class="product_category">In <a href="category.php">Category</a></div>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-auto text-right">
                                                                    <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                    <div class="product_price text-right">$3<span>.99</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_buttons">
                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/heart.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/cart_2.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/3.jpg" alt=""></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url(img/fon.jpg)"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Популярные</div>
                                        <div class="home_subtitle">Чаи</div>
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/4.jpg" alt=""></a></div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>от</div>
                                                                <div>200<span>&#8381</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product_image"><img src="img/5.jpg" alt=""></div>
                                                        <div class="product_content">
                                                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                <div>
                                                                    <div>
                                                                        <div class="product_name"><a href="product.php">Cool Clothing with Brown Stripes</a></div>
                                                                        <div class="product_category">In <a href="category.php">Category</a></div>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-auto text-right">
                                                                    <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                    <div class="product_price text-right">$3<span>.99</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_buttons">
                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/heart.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/cart_2.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/6.jpg" alt=""></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url(img/fon.jpg)"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Сезонные</div>
                                        <div class="home_subtitle">Чаи</div>
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/7.jpg" alt=""></a></div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>от</div>
                                                                <div>200<span>&#8381</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product_image"><img src="img/8.jpg" alt=""></div>
                                                        <div class="product_content">
                                                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                <div>
                                                                    <div>
                                                                        <div class="product_name"><a href="product.php">Cool Clothing with Brown Stripes</a></div>
                                                                        <div class="product_category">In <a href="category.php">Category</a></div>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-auto text-right">
                                                                    <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                    <div class="product_price text-right">$3<span>.99</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_buttons">
                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/heart.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/cart_2.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/1.jpg" alt=""></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-image:url(img/fon.jpg)"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Премиум</div>
                                        <div class="home_subtitle">Чаи</div>
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/2.jpg" alt=""></a></div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>от</div>
                                                                <div>200<span>&#8381</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="product_image"><img src="img/3.jpg" alt=""></div>
                                                        <div class="product_content">
                                                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                                <div>
                                                                    <div>
                                                                        <div class="product_name"><a href="product.php">Cool Clothing with Brown Stripes</a></div>
                                                                        <div class="product_category">In <a href="category.php">Category</a></div>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-auto text-right">
                                                                    <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                                                    <div class="product_price text-right">$3<span>.99</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="product_buttons">
                                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/heart.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                                        <div>
                                                                            <div><img src="images/cart_2.svg" alt="">
                                                                                <div>+</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side"><a href="product.php"><img src="img/4.jpg" alt=""></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            <div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
                                    <li class="home_slider_custom_dot active">01</li>
                                    <li class="home_slider_custom_dot">02</li>
                                    <li class="home_slider_custom_dot">03</li>
                                    <li class="home_slider_custom_dot">04</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Products -->
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">Популярно в Baigaliin Luu</div>
                </div>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <ul class="d-flex flex-row align-items-start justify-content-center">
                            <li class="active"><a href="category.php">Чаи</a></li>
                            <li><a href="category.php">Травы</a></li>
                            <li><a href="category.php">Подарки</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row products_row">
                <?php
                require "requires/connect.php";
                $query = "SELECT * FROM tea";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_row($result)) {
                    $query1 = "SELECT * FROM tea_weight WHERE tea_id=" . $row[0] . ' ORDER BY weight';
                    $result1 = mysqli_query($link, $query1);
                    $row1 = mysqli_fetch_row($result1);
                    $fweight = $row1[2];
                ?>

                    <!-- Product -->
                    <div class="col-xl-4 col-md-6"><a href="product.php/<?php echo $row[1] ?>">
                            <div class="product">
                                <div class="product_image"><img src="<?php echo $row[5] ?>" alt=""></div>
                                <div class="product_content">
                                    <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                        <div>
                                            <div class="info_prod">
                                                <div class="product_name"><a href="product.php"><?php echo $row[2] ?></a></div>
                                                <div class="product_category">В <a href="category.php">Категории <?php echo $row[7] ?></a></div>
                                            </div>
                                        </div>
                                        <div class="ml-auto text-right">
                                            <div class="rating_r rating_r_4 home_item_rating"><a href="comments.php"><i></i><i></i><i></i><i></i><i></i></div>
                        </a>
                        <div class="product_price text-right"><?php echo $row1[3] ?><span>&#8381</span></div>
                        <div>
                            <select name="product_weight" id="product_weight<?php echo $row[0] ?>" class="product_weight" require="required" onchange="change_weight(<?php echo $row[0] ?>)">
                                <?php
                                do {
                                    echo "<option  value=\"" . $row1[2] . "\">" . $row1[2] . "г</option>";
                                } while ($row1 = mysqli_fetch_row($result1));
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="product_buttons">
                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <div><img src="images/heart_2.svg" class="svg" alt="">
                                <div>+</div>
                            </div>
                        </div>
                    </div>
                    <div id="p_add<?php echo $row[0] ?>" class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" onclick="addToCart(<?php echo $row[0] . ',' . $fweight; ?>)">
                        <div>
                            <div><img src="images/cart.svg" class="svg" alt="">
                                <div>+</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>
</div>

<div class="row load_more_row">
    <div class="col">
        <div class="button load_more ml-auto mr-auto"><a href="#">Далее</a></div>
    </div>
</div>
</div>
</div>
<!-- Boxes -->
<div class="boxes">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="boxes_container d-flex flex-row align-items-start justify-content-between flex-wrap">

                    <!-- Box -->
                    <div class="box">
                        <div class="background_image" style="background-image:url(img/box_1_1.jpg)"></div>
                        <div class="box_content d-flex flex-row align-items-center justify-content-start">
                            <div class="box_left">
                                <div class="box_image">
                                    <a href="category.php">
                                        <div class="background_image" style="background-image:url(img/box_1.jpg)"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="box_right text-center">
                                <div class="box_title">Чаи</div>
                            </div>
                        </div>
                    </div>

                    <!-- Box -->
                    <div class="box">
                        <div class="background_image" style="background-image:url(img/box_2_2.jpg)"></div>
                        <div class="box_content d-flex flex-row align-items-center justify-content-start">
                            <div class="box_left">
                                <div class="box_image">
                                    <a href="category.php">
                                        <div class="background_image" style="background-image:url(img/box_2.jpg)"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="box_right text-center">
                                <div class="box_title">Травы</div>
                            </div>
                        </div>
                    </div>

                    <!-- Box -->
                    <div class="box">
                        <div class="background_image" style="background-image:url(img/box_3_3.jpg)"></div>
                        <div class="box_content d-flex flex-row align-items-center justify-content-start">
                            <div class="box_left">
                                <div class="box_image">
                                    <a href="category.php">
                                        <div class="background_image" style="background-image:url(img/box_3.jpg)"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="box_right text-center">
                                <div class="box_title">Подарки</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features -->
<div class="features">
    <div class="container">
        <div class="row">
            <!-- Feature -->
            <div class="col-lg-4 feature_col">
                <div class="feature d-flex flex-row align-items-start justify-content-start">
                    <div class="feature_left">
                        <div class="feature_icon"><img src="images/icon_1.svg" alt=""></div>
                    </div>
                    <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                        <div class="feature_title">Быстрые безопасные платежи</div>
                    </div>
                </div>
            </div>
            <!-- Feature -->
            <div class="col-lg-4 feature_col">
                <div class="feature d-flex flex-row align-items-start justify-content-start">
                    <div class="feature_left">
                        <div class="feature_icon ml-auto mr-auto"><img src="images/icon_2.svg" alt=""></div>
                    </div>
                    <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                        <div class="feature_title">Премиум продукты</div>
                    </div>
                </div>
            </div>
            <!-- Feature -->
            <div class="col-lg-4 feature_col">
                <div class="feature d-flex flex-row align-items-start justify-content-start">
                    <div class="feature_left">
                        <div class="feature_icon"><img src="images/icon_3.svg" alt=""></div>
                    </div>
                    <div class="feature_right d-flex flex-column align-items-start justify-content-center">
                        <div class="feature_title">Бесплатная доставка</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php require "blocks_header_footer/footer.php" ?>
<script src="js/add_cart.js"></script>
<script src="js/prototype.js"></script>
<script src="js/add_to_weight.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/search_ajax.js"></script>
<script src="js/search.js"></script>
<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>
</body>

</html>