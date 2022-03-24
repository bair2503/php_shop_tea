<?php
require "../requires/connect.php";
if (isset($_POST['search_button'])) {
    $search = $_POST['search'];
    $query_product = mysqli_query($link, "SELECT * FROM tea WHERE name = '$search' ");
}
else{
    $query_product = mysqli_query($link, "SELECT * FROM tea");
}

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
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <?php
                            $product = mysqli_query($link, "SELECT * FROM tea");
                            while ($product = mysqli_fetch_assoc($query_product)) {?>
                            <th>id продукта</th>
                            <th>Имя Страницы</th>
                            <th>Название чая</th>
                            <th>Статус</th>
                            <th>Цена</th>
                            <th>Скидки</th>
                            <th>изображение</th>
                            <th>Описания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $product['id']?></td>
                            <td><?php echo $product['name_page']?></td>
                            <td><?php echo $product['name']?></td>
                            <td><?php echo $product['status']?></td>
                            <td><?php echo $product['price']?></td>
                            <td><?php echo $product['sale']?></td>
                            <td><img src="../img/<?php echo $product['imgFile']?>.jpg" width="100" alt=""></td>
                            <td><?php echo $product['description']?></td>
                            <?php
                            }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--/.row-->

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

