<?php
session_start();


require "../requires/connect.php";


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php require "blocks_admin/admin_header.php"?>
<?php require "../requires/connect.php" ?>
<div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">Добавление продукта</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <form role="form" action="add_productquery.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Страница продукта</label>
                                <input class="form-control"name="product" rows="1" type="text"> <?php echo $_SESSION['field']['product']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Название продукта</label>
                                <input class="form-control" rows="2" name="name_product" type="text"><?php echo $_SESSION['field']['name_product']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Статус продукта</label>
                                <input class="form-control" rows="3" name="status_product" type="text"><?php echo $_SESSION['field']['status_product']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Скидки Распродажа</label>
                                <input class="form-control" rows="3" name="sela_product" type="number"><?php echo $_SESSION['field']['sela_product']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Категория продукта</label>
                                <input class="form-control" rows="4" name="category_product" type="text"><?php echo $_SESSION['field']['category_product']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Фото продукта</label>
                                <input type="file" name="file1">
                                <p class="help-block">Основное фото</p>
                            </div>
                            <div class="form-group">
                                <label>Фото продукта</label>
                                <input type="file" name="file2">
                                <p class="help-block">Второе фото</p>
                            </div>
                            <div class="form-group">
                                <label>Вес Продукта</label>
                                <input class="form-control" rows="3" type="number" name="wight"><?php echo $_SESSION['field']['wight']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Вес Продукта</label>
                                <input class="form-control" rows="3" type="number" name="price"><?php echo $_SESSION['field']['price']; ?></input>
                            </div>
                            <div class="form-group">
                                <label>Описание продукта</label>
                                <input class="form-control" rows="3" type="text" name="text"><?php echo $_SESSION['field']['text']; ?></input>
                            </div>
                            <input type="submit" class="btn btn-primary" value="добавить"></input>
                            <p>
                                Добавление продукта -
                            </p>
                            <?php
                            if($_SESSION['message']){
                                echo '<p class="msg">' .$_SESSION['message']. '</p>';
                            }
                            unset($_SESSION['message']);
                            ?>
                            <button type="reset" class="btn btn-default">Сброс</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
    </div>
</div><!-- /.row -->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</
