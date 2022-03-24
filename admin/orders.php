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
<?php require "blocks_admin/admin_header.php";?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Заказы
                <div class="col-lg-12">
            </div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <div class="col-xs-4 col-md-4 col-lg-4 no-padding">№ Заказа
                    <input type="text" placeholder="№ Заказа">
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4 no-padding">статус заказа
                    <input type="text" placeholder="статус заказа">
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4 no-padding">покупатель
                    <input type="text" placeholder="покупатель">
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4 no-padding">Итого
                        <input type="text" placeholder="Итого">
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4 no-padding">Дата добавления
                    <input type="text" placeholder="Дата добавления">
                    </div>
                    <div class="col-xs-4 col-md-4 col-lg-4 no-padding">Дата изменения
                    <input type="text" placeholder="Дата изменения">
                    </div>
                </div>
            </div>


        </div><!--/.row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Заказы
                        </div>
                            <div class="col-lg-12">
                            </div>
                            <div class="panel-body">
                                <div class="canvas-wrapper">


                                    <?php

                                    require "../requires/connect.php";
                                    $query = "SELECT * FROM orders_info";
                                    $result = mysqli_query($link,$query);
                                    while ($row = mysqli_fetch_row($result)){
                                        ?>

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Заказа № </th>
                                                <th>Покупатель</th>
                                                <th>статус</th>
                                                <th>Всего</th>
                                                <th>Создан</th>
                                                <th>Обновлен</th>
                                                <th>Действия</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $row[0]?></td>
                                                <td><?php echo $row[2]?></td>
                                                <td><?php echo $row[3]?></td>
                                                <td><?php echo $row[4]?></td>
                                                <td><?php echo $row[3]?></td>


                                            </tr>
                                            </tbody>
                                        </table>

                                    <?php }?>

                                </div>
                                </div>
                            </div>


                        </div><!--/.row-

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
</>