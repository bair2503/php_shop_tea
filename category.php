<?php
require "requires/user_id.php";

if(isset($_SESSION['cart_list'])){
echo "Корзина:" . count($_SESSION['cart_list']) . "товара";
}

?>
<?php
require "requires/connect.php";


if(!empty($_POST['add'])){
    $id_product = $_POST['id_product'];
    $query1 = "SELECT id, col_product FROM basket WHERE id_product = ".$id_product." AND user_id = '".$_COOKIE['user_id']."'";
    $result1 = mysqli_query($link, $query1);
    if(mysqli_num_rows($result1 )!= 0){
        $row1 = mysqli_fetch_row($result1);
        $query2 = "UPDATE basket SET col_product=".($row1[1] +1)." WHERE id = ".$row1[0];
        $result2 = mysqli_query($link, $query2);
    }
    else {
        $query2 = "INSERT INTO basket (id_product,user_id, col_product VALUES (".$id_product.",  '".$_COOKIE['user_id']."', 1)";
        $result2 = mysqli_query($link, $query2);
        echo $query2;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/category.css">
    <link rel="stylesheet" type="text/css" href="styles/category_responsive.css">
</head>
<body>

<!-- Menu -->



<div class="super_container">

    <!-- Header -->
    <?php require "blocks_header_footer/header.php"?>

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Home -->

        <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Все Категории</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="index.php">Главная</a></li>
                            <li><a href="category.php">Woman</a></li>
                            <li>Новые Продукты</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <div class="products">
            <div class="container">
                <div class="row products_bar_row">
                    <div class="col">
                        <div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
                            <div class="products_bar_links">
                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                    <li><a href="#">Все</a></li>
                                    <li><a href="#">Хит продаж</a></li>
                                    <li class="active"><a href="#">Новые Продукты</a></li>
                                    <li><a href="#">Распродажа товаров</a></li>
                                </ul>
                            </div>
                            <div class="products_bar_side d-flex flex-row align-items-center justify-content-start ml-lg-auto">
                                <div class="products_dropdown product_dropdown_sorting">
                                    <div class="isotope_sorting_text"><span>Default Sorting</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                    <ul>
                                        <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>По умолчанию</li>
                                        <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>по цене</li>
                                        <li class="item_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>по наименованию</li>
                                    </ul>
                                </div>
                                <div class="product_view d-flex flex-row align-items-center justify-content-start">
                                    <div class="view_item active"><img src="images/view_1.png" alt=""></div>
                                    <div class="view_item"><img src="images/view_2.png" alt=""></div>
                                    <div class="view_item"><img src="images/view_3.png" alt=""></div>
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="isotope_filter_text"><span>Фильтр</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                    <ul>
                                        <li class="item_filter_btn" data-filter="*">Все</li>
                                        <li class="item_filter_btn" data-filter=".hot">Хит</li>
                                        <li class="item_filter_btn" data-filter=".new">Новое</li>
                                        <li class="item_filter_btn" data-filter=".sale">Распродажа</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row products_row products_container ">

                    <!-- Product -->
                    <?php
                    require "requires/connect.php";
                    $query = "SELECT * FROM tea";
                    $result = mysqli_query($link,$query);
                    while ($row = mysqli_fetch_row($result)){
                        ?>
                    <div class="col-xl-4 col-md-6"><a href="product.php/<?php echo $row[1]?>"</a>
                        <div class="product">
                            <div class="product_image"><img src="img/<?php echo $row[7] ?>.jpg" alt=""></div>
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a href="product.php"><?php echo $row[2]?></a></div>
                                            <div class="product_category">В <a href="category.php">Категории <?php echo $row[9]?></a></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="product_price text-right"><?php echo $row[4]?><span>&#8381</span></div>
                                        <div>
                                            <select name="product_weight" id="product_weight" class="product_weight" require="required">
                                                <option>200 г</option>
                                                <option>1 кг</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div>
                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" onclick="addToCart(<?php echo $row[0] ?>)">
                                            <div><div><img src="images/cart.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="row page_nav_row">
                    <div class="col">
                        <div class="page_nav">
                            <ul class="d-flex flex-row align-items-start justify-content-center">
                                <li class="active"><a href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#">04</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/Isotope/fitcolumns.js"></script>
<script src="js/category.js"></script>
</body>
</html></html>