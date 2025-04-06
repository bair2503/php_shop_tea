<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/my.css">
</head>
<body>
<?php
require "requires/user_id.php";
require "blocks_header_footer/header.php";
require "requires/connect.php";

$timestamp = date('Y-m-d H:i:s');
$query = "INSERT INTO orders_info (data_orders ,user_id, status_order)  VALUES ('$timestamp',".$_COOKIE['id'].", '1')";
echo $query;
$result = mysqli_query($link, $query);
$id_order = $link -> insert_id;

foreach ($_POST['basket'] as $prod){
    $tea_id = $prod[0];
    $tea_col = $prod[1];
    $weight = $prod[2];
    $query = "SELECT price FROM tea_weight WHERE tea_id=".$tea_id.' AND weight='.$weight;

    $result = mysqli_query($link, $query);
    $row = $result -> fetch_row();
    $price = $row[0];
    $query = "INSERT INTO orders_items (id_order, id_product, col_product, price,weight) VALUES ($id_order, $tea_id,$tea_col, $price, $weight)";
    $result1=mysqli_query($link,$query);
}
?>

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Данные покупателя</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="index.php">Главная</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<div class="row">
					
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Данные</div>
							<div class="checkout_form_container">
								<form action="orders.php" method="post" id="checkout_form" class="checkout_form">
                                    <input type="hidden" name="order_id" value="<?php echo $id_order ?>">
									<div class="row">
										<div class="col-lg-6">
											<!-- Name -->
											<input type="text" id="checkout_name" class="checkout_input" name="name" placeholder="Имя" required="required">
										</div>
										<div class="col-lg-6">
											<!-- Last Name -->
											<input type="text" id="checkout_last_name" class="checkout_input" name="lastname" placeholder="Фамилия" required="required">
										</div>
									</div>
									<div>
										<!-- Country -->
										<select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
											<option>Москва</option>
											<option>Московская область</option>
											<option>Регион</option>
										</select>
									</div>
									<div>
										<!-- Address -->
										<input type="text" id="checkout_address" name="address" class="checkout_input" placeholder="Адрес доставки" required="required">

									</div>
									<div>
										<!-- Zipcode -->
										<input type="text" id="checkout_zipcode" class="checkout_input" name="index" placeholder="индекс" required="required">
									</div>
									<div>
										<!-- City / Town -->

									</div>
									<div>
										<!-- Province -->

									</div>
									<div>
										<!-- Phone no -->
										<input type="phone" id="checkout_phone" class="checkout_input" name="telephone" placeholder="Телефон" required="required">
									</div>
									<div>
										<!-- Email -->
										<input type="phone" id="checkout_email" class="checkout_input" placeholder="Email" name="email" required="required">
									</div>
									<div class="checkout_extra">
										<ul>
											<li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_1" name="billing_checkbox" class="billing_checkbox">
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Условия</span>
												</label>
											</li>
											<li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_2" name="billing_checkbox" class="billing_checkbox">
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Создать учетную запись</span>
												</label>
											</li>
											<li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_3" name="billing_checkbox" class="billing_checkbox">
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Подпишитесь на нашу рассылку новостей</span>
												</label>
											</li>
										</ul>
									</div>

							</div>
						</div>
					</div>

					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title">Всего </div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Товары</div>
										<div class="cart_extra_total_value ml-auto">Количество товара</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Доставка</div>
										<div class="cart_extra_total_value ml-auto"><?php echo $_POST['address'];?> </div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">К оплате</div>
										<div class="cart_extra_total_value ml-auto"></div>
									</li>
								</ul>
								<div class="payment_options">
									<div class="checkout_title">Способ оплаты</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="paymentmetod" class="payment_radio" value="Card">
												<span class="radio_mark"></span>
												<span class="radio_text">Картой</span>
											</label>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_2" name="paymentmetod" class="payment_radio" value="Nal">
												<span class="radio_mark"></span>
												<span class="radio_text">Наличными курьеру</span>
											</label>
										</li>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_3" name="paymentmetod" class="payment_radio" value="Deleverri" checked>
												<span class="radio_mark"></span>
												<span class="radio_text">Онлайн</span>
											</label>
										</li>
									</ul>
								</div>
								<div class="cart_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
								</div>
								<div class="checkout_button trans_200"><input type="submit" name="orders" value="Оформление заказа"></a></div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>