<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Чек заказа</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Чек заказа">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/checkout.css">
    <link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/check.css">

</head>

<body>

    <?php
    require "requires/user_id.php";
    require "blocks_header_footer/header.php";
    require "requires/connect.php";

    // Обновляем данные заказа
    $timestamp = date('Y-m-d H:i:s');
    $query = "UPDATE orders_info SET data_orders='$timestamp', user_id=" . $_COOKIE['id'] . ", status_order='1', name='" . $_POST['name'] . "', lastname='" . $_POST['lastname'] . "', checkout_country='" . $_POST['checkout_country'] . "', address='" . $_POST['address'] . "', post_index='" . $_POST['index'] . "', telephone='" . $_POST['telephone'] . "', email='" . $_POST['email'] . "', paymentmetod='" . $_POST['paymentmetod'] . "' WHERE id=" . $_POST['order_id'];
    $result = mysqli_query($link, $query);

    // Получаем данные заказа для чека
    $order_id = $_POST['order_id'];
    $order_query = "SELECT * FROM orders_info WHERE id = $order_id";
    $order_result = mysqli_query($link, $order_query);
    $order = mysqli_fetch_assoc($order_result);

    // Преобразуем статус заказа в читаемый вид
    $status_map = [
        'awaiting assembly' => 'Ожидает сборки',
        'assembling' => 'Собирается',
        'ready' => 'Готов',
        'awaiting payment' => 'Ожидает оплаты',
        'paid for' => 'Оплачен',
        'shipped' => 'Отправлен',
        'received' => 'Получен',
        'rejection' => 'Отменен'
    ];
    $status = $status_map[$order['status_order']];

    // Преобразуем метод оплаты
    $payment_map = [
        'Card' => 'Картой',
        'Nal' => 'Наличные',
        'Deleverri' => 'При доставке',
        '' => 'Не указан'
    ];
    $payment_method = $payment_map[$order['paymentmetod']];

    // Форматируем дату
    $order_date = date('d.m.Y H:i', strtotime($order['data_orders']));
    ?>

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title">Ваш заказ оформлен</div>
                <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                    <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                        <li><a href="index.php">Главная</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Чек заказа -->
    <div class="receipt-container">
        <div class="receipt-header">
            <div class="receipt-title">Чек заказа №<?php echo $order['id']; ?></div>
            <div>Дата: <?php echo $order_date; ?></div>
            <div>Статус: <?php echo $status; ?></div>
        </div>

        <div class="receipt-info">
            <h4>Информация о покупателе:</h4>
            <p><strong>ФИО:</strong> <?php echo $order['lastname'] . ' ' . $order['name']; ?></p>
            <p><strong>Телефон:</strong> <?php echo $order['telephone']; ?></p>
            <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
        </div>

        <div class="receipt-info">
            <h4>Адрес доставки:</h4>
            <p><strong>Страна:</strong> <?php echo $order['checkout_country']; ?></p>
            <p><strong>Адрес:</strong> <?php echo $order['address']; ?></p>
            <p><strong>Почтовый индекс:</strong> <?php echo $order['post_index']; ?></p>
        </div>

        <div class="receipt-info">
            <h4>Информация о заказе:</h4>
            <p><strong>Количество товаров:</strong> <?php echo $order['total_products']; ?> шт.</p>
            <p><strong>Сумма к оплате:</strong> <?php echo $order['total_amount']; ?> руб.</p>
            <p><strong>Метод оплаты:</strong> <?php echo $payment_method; ?></p>
        </div>

        <div class="receipt-info">
            <h4>Спасибо за ваш заказ!</h4>
            <p>Наш менеджер свяжется с вами в ближайшее время для подтверждения заказа.</p>
        </div>

        <div class="receipt-footer">
            Чек сгенерирован автоматически<br>
            <?php echo date('d.m.Y H:i'); ?>
        </div>
    </div>

    <?php require "blocks_header_footer/footer.php"; ?>

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
    <script src="js/search.js"></script>
    <script src="js/search_ajax.js"></script>
    <script src="js/jquery.js"></script>
</body>

</html>