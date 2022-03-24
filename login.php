<?php
session_start();

require 'requires/connect.php';
require "requires/user_id.php";

if($_SESSION['user']){
    header('Location: profile.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<?php require "blocks_header_footer/header.php"?>
<?php require "requires/connect.php" ?>
<!-- Форма авторизации -->

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="users-auto/signin.php"  method="post" nctype="multipart/form-data">
                    <div class="text-center">
                        <label>Логин</label>
                        <input type="text" name="login" placeholder="Введите свой логин">
                    </div>
                    <div class="text-center">
                        <label>Пароль</label>
                        <input type="password" name="password" placeholder="Введите ваш пароль">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Войти</button>
                        <p>У вас нет аккаунта? - <a href="/registration.php">Зарегистрируйтесь</a></p>
                    </div>
                    <?php
                    if($_SESSION['message']){
                        echo '<p class="msg">' .$_SESSION['message']. '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="js/product.js"></script>
</body>
</html>