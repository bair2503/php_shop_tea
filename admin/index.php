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

    <div class="row">
        <div class="col-xs-8 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Заказы</h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-8 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Комментарии</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-8 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Новые Пользователи</h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    </div><!--/.row-->
</div>	<!--/.main-->

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