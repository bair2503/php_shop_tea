<?php
    session_start();
require "requires/user_id.php";


if($_SESSION['user']){
    header('Location: profile.php');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <title>Авторизация и регистрация</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/flexslider/flexslider.css">
    <link rel="stylesheet" type="text/css" href="styles/product.css">
    <link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>
<?php require "blocks_header_footer/header.php"?>
<?php require "requires/connect.php" ?>
    <!-- Форма авторизации -->
<div class="align-content-center">
    <div class="product">
        <div class="container">
    <form action="users-auto/singup.php"  method="post" enctype="multipart/form-data">
        <div class="text-center">
            <label >ФИО</label>
            <input type="text" name="full_name" placeholder="Введите свое имя  value=" <?php echo $_SESSION['field']['full_name']; ?> ">
        </div>
        <div class="text-center">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите свой логин=" <?php echo $_SESSION['field']['login']; ?> ">
        </div>
        <div class="text-center">
            <label>Почта</label>
            <input type="email" name="email" placeholder="Введите адрес своей почты=" <?php echo $_SESSION['field']['email']; ?>">
        </div>
        <div class="text-center">
            <label>Изображения профиля</label>
            <input type="file" name="avatar" >
        </div>
        <div class="text-center">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите свой пароль">
        </div>
        <div class="text-center">
            <label>Подтверждение пароля</label>
            <input type="password" name="password_confirm" placeholder="Подтверждение пароля">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Зарегистрируйтесь</button>
        <p>
            У вас уже есть аккаунт? - <a href="/login.php">Авторизирутесь</a>
        </p>
        <?php
            if($_SESSION['message']){
                echo '<p class="msg">' .$_SESSION['message']. '</p>';
            }
            unset($_SESSION['message']);
        ?>
        </div>

    </form>
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