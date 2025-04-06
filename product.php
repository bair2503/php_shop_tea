<?php session_start();

require "requires/user_id.php";
if(isset($_SESSION['cart_list'])){
    echo "Корзина:" . count($_SESSION['cart_list']) . "товара";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/flexslider/flexslider.css">
    <link rel="stylesheet" type="text/css" href="../styles/product.css">
    <link rel="stylesheet" type="text/css" href="../styles/product_responsive.css">
    <link rel="stylesheet" type="text/css" href="../styles/my.css">
</head>
<body>
<?php require "blocks_header_footer/header.php"?>
<?php
require "requires/connect.php";
$s = substr($_SERVER['REQUEST_URI'], strripos($_SERVER['REQUEST_URI'], '/')+1);
$query = "SELECT * FROM tea WHERE name_page = '$s' ";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_row($result);
$id_product = $row[0];
$product_page = $row[1];
if(!empty($_POST['add'])){
    $query1 = "SELECT id, col_product FROM basket WHERE id_product = ".$row[0]." AND user_id = '".$_COOKIE['user_id']."'";
    $result1 = mysqli_query($link, $query1);
    if(mysqli_num_rows($result1 )!= 0){
        $row1 = mysqli_fetch_row($result1);
        $query2 = "UPDATE basket SET col_product=".($row1[1] +1)." WHERE id = ".$row1[0];
        $result2 = mysqli_query($link, $query2);
    }
    else {
        $query2 = "INSERT INTO basket (id_product,user_id, col_product) VALUES (".$row[0].",  '".$_COOKIE['user_id']."',1)";
        $result2 = mysqli_query($link, $query2);
    }
}

?>
	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Страница продукта</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="../index.php">Главная</a></li>
							<li><a href="../category.php">Чаи</a></li>
							<li>Новый продукт</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Product -->
        <?php
        require "requires/connect.php";
        $query1 = "SELECT * FROM tea_weight WHERE tea_id=".$row[0] .' ORDER BY weight';
        $result1 = mysqli_query($link,$query1);
        $row1 = mysqli_fetch_row($result1);
        ?>
		<div class="product">
			<div class="container">
				<div class="row">

					<!-- Product Image -->
					<div class="col-lg-6">
						<div class="product_image_slider_container">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<li>
                                        <img src="../<?php echo $row[5] ?>"/>
									</li>
									<li>
                                        <img src="../<?php echo $row[9] ?>"/>
									</li>
								</ul>
							</div>
							<div class="carousel_container">
								<div id="carousel" class="flexslider">
									<ul class="slides">
										<li>
											<div><img src="../<?php echo $row[5] ?>"></div>
										</li>
										<li>
											<div><img src="../<?php echo $row[9] ?>" /></div>
										</li>
									</ul>
								</div>
								<div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
								<div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<div class="product_info">
							<div class="product_name"><?php echo $row[2]?></div>
							<div class="product_category"><a href="../category.php"><?php echo $row[7]?></a></div>
							<div class="product_price"><?php echo $row1[3]?><span>&#8381</span></div>
                            <div>
                                <select name="product_weight" id="product_weight<?php echo $row[0]?>" class="product_weight" require="required" onchange="change_weight(<?php echo $row[0]?>)">
                                    <?php
                                    do {
                                        echo "<option  value=\"" . $row1[2] . "\">" . $row1[2] . "г</option>";
                                    }
                                    while ($row1 = mysqli_fetch_row($result1));
                                    ?>
                                </select>
                            </div>
                            <div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
                                <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                <div class="product_reviews_link"><a href="../comments.php">отзывы</a></div>
                            </div>
                            <form action="" method="post">
                                <div class="product_buttons">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="../images/heart_2.svg" class="svg" alt=""><div>+</div></div></div></div>
                                        <div id="p_add<?php echo $row[0] ?>" class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center" onclick="addToCart(<?php echo $row[0] ?>,200)">
                                            <div><div><img type="button"  src="../images/cart.svg" class="svg"  alt="" width="35" height="35">
                                                    <div>+</div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
							<div class="product_text">
								<p><?php echo $row[8]?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Boxes -->
		<div class="boxes">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="box d-flex flex-row align-items-center justify-content-start">
							<div class="mt-auto"><div class="box_image"><img src="../images/boxes_1.png" alt=""></div></div>
							<div class="box_content">
								<div class="box_title">Руководство по выбору</div>
								<div class="box_text">Чай уже несколько столетий является главным горячим напитком в России. Читайте о том, на что стоит обратить внимание при выборе заварки и как не ошибиться при покупке.</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 box_col">
						<div class="box d-flex flex-row align-items-center justify-content-start">
							<div class="mt-auto"><div class="box_image"><img src="../images/boxes_2.png" alt=""></div></div>
							<div class="box_content">
								<div class="box_title">Доставка</div>
								<div class="box_text">Чай — древний благородный напиток. Его пользу сложно переоценить, когда ритуал чаепития устраивается правильно. Чайный напиток распространен так сильно, что потребитель может легко запутаться в многообразии выбора.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<?php require "blocks_header_footer/footer.php"?>
<script src="../js/add_cart.js"></script>
<script src="../js/prototype.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap-4.1.2/popper.js"></script>
<script src="../styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/progressbar/progressbar.min.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="../js/product.js"></script>
<script src="../js/add_to_weight.js"></script>
</body>
</html>