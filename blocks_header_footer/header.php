<!--blocks_header_footer/header.php -->
<!-- Menu -->
<?php
require 'requires/connect.php';
$query = 'SELECT COUNT(id) FROM basket WHERE user_id ="' . $_COOKIE['user_id'] . '"';
$result = $link->query($query);
$row = $result->fetch_row();
?>
<div class="menu">

    <!-- Search -->
    <div class="menu_search">
        <form id="menu_search_form" class="menu_search_form" onsubmit="return false;">
            <input type="text" class="search_input" id="search_input" placeholder="Search Item" required="required">
            <button class="menu_search_button" type="submit">
                <img src="images/search.png" alt="">
            </button>
        </form>
        <!-- Здесь появятся результаты -->
        <div id="search_results" style="background:white; position:absolute; z-index:1000; max-height:200px; overflow-y:auto; width: 300px;"></div>
    </div>

    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            <li><a href="#">Чаи</a></li>
            <li><a href="#">Травы</a></li>
            <li><a href="#">Подарки</a></li>
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_phone d-flex flex-row align-items-center justify-content-start">
            <div>
                <div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div>
            </div>
            <div>+7 926-078-89-79</div>
        </div>
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_overlay"></div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo">
                <a href="/index.php">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="images/logo_1.png" alt=""></div>
                        <div>Baigaliin Luu</div>
                    </div>
                </a>
            </div>
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <li class="active"><a href="#">Чаи</a></li>
                    <li><a href="#">Травы</a></li>
                    <li><a href="#">Подарки</a></li>
                </ul>
            </nav>
            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
                <!-- Search -->
                <div class="header_search">
                    <form action="#" id="header_search_form">
                        <input type="text" class="search_input" placeholder="поиск" required="required">
                        <button class="header_search_button"><img src="../images/search.png" alt=""></button>
                    </form>
                </div>
                <!-- User -->
                <div class="user" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><a href="../registration.php">
                        <div><img class="svg" src="../images/user.svg" alt="https://www.flaticon.com/authors/freepik">
                            <div>1</div>
                        </div>
                    </a></div>
                <!-- Cart -->
                <div class="cart"><a href="../cart.php">
                        <div><img class="svg" src="../images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
                            <div id="basket_count"><?php echo $row[0]; ?></div>
                        </div>
                    </a></div>
                <!-- Phone -->
                <div class="header_phone d-flex flex-row align-items-center justify-content-start">
                    <div>
                        <div><img src="../images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div>
                    </div>
                    <div>+7 926-078-89-99</div>
                </div>
            </div>
        </div>
    </header>