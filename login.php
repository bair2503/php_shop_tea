<?php
session_start();

require 'requires/connect.php';
require "requires/user_id.php";

if($_SESSION['user']){
    header('Location: profile.php');
}
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
    <link rel="stylesheet" type="text/css" href="styles/my.css">
</head>
</head>
<body>

<?php require "blocks_header_footer/header.php"?>
<?php require "requires/connect.php" ?>
<!-- Форма авторизации -->

<div class="super_container_inner">
    <div class="super_overlay"></div>
    <!-- Home -->
    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title">Войти</div>
                <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                    <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                        <li><a href="registration.php">Регистрация</a></li>
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

                        <form action="users-auto/signin.php"  method="post" nctype="multipart/form-data">
                            <div class="text-center">
                                <div class="stl">
                                    <input class="search_input" type="text" name="login" placeholder="Логин">
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="stl">
                                    <input class="search_input" name="password" type="password" placeholder="Пароль">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn">Войти</button>
                                <p>
                                    У вас нет аккаунта? - <a href="/registration.php" class="a">Зарегистрируйтесь</a>
                                </p>
                            <?php
                            if($_SESSION['message']){
                                echo '<p>' .$_SESSION['message']. '</p>';
                            }
                            unset($_SESSION['message']);
                            ?>
                            </div>
                        </form>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="js/product.js"></script>
</body>
</html>