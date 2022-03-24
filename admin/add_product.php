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
<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Добавление продукта</div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        <form role="form">
                            <div class="form-group">
                                <label>Название страницы</label>
                                <textarea class="form-control" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Название продукта</label>
                                <textarea class="form-control" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Категория продукта</label>
                                <textarea class="form-control" rows="1"></textarea>
                            </div>
                            <div class="form-group checkbox">
                                <label>
                                    <input type="checkbox">Remember me
                                </label>
                            </div>
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Text area</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <label>Validation</label>
                            <div class="form-group has-success">
                                <input class="form-control" placeholder="Success">
                            </div>
                            <div class="form-group has-warning">
                                <input class="form-control" placeholder="Warning">
                            </div>
                            <div class="form-group has-error">
                                <input class="form-control" placeholder="Error">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
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
