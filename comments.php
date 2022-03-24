<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Little Closet template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<?php
require "blocks_header_footer/header.php";
require_once "requires/connect.php";
require_once "requires/func_comment.php";



$itemsPerPage = 4;
if(empty($_GET['page']))
    $page = 0;
else
    $page = $_GET['page'];
$first = $page * $itemsPerPage;
$items = get_cout($link, $first, $itemsPerPage);
$pages = intval($items / $itemsPerPage);
if($items % $itemsPerPage != 0)
    $pages++;



if(!empty($_POST['send'])){
    save_mess($link);
    header("Location: {$_SERVER['PHP_SELF']}");
    echo "<p>Данные занесены в базу</p>";
}

else {


    $messages = get_mess($link, $first, $itemsPerPage, $id_product);
//$messages = array_mess($messages);
//print_arr($messages);
    ?>
    <div class="container mt-5">
        <h3>Отзывы</h3>


        <style>
            .message{
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 20px;
            }

        </style>
        <form method="post">
            <input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
            <input type="text" name="name" placeholder="Введите имя" class="form-control"><br>
            <input type="email" name="email" placeholder="Введите Email" class="form-control"><br>
            <div class="fline"><div class="fname">Скрыть имя и адрес:</div>
                <div class="field"><input type="radio" value="0" name="notas" checked>Нет&nbsp; &nbsp; &nbsp;
                    <input type="radio" value="1" name="notas">Да</div></div>
            <textarea name="text" class="form-control" placeholder="Введите сообщение"></textarea><br>
            <button type="submit" name="send" value="sendet" class="btn btn-success">Отправить</button>
        </form>
        <hr>
        <?php if(!empty($messages)): ?>
            <?php foreach($messages as $message): ?>
                <div class="message">
                    <p>Автор: <?=stripslashes($message['user_name'])?> | Email: <?=$message['email'] ?></p>
                    <div><?=nl2br(htmlspecialchars (stripslashes($message['text'])))?></div>
                    <p>Дата: <?=$message['date']?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <hr>
        <nav>
            <ul class="pagination">
                <?php  if($page != 0)
                    echo "<li><a href='product.php/".$product_page."'>В Начало</a></li>";
                else
                    echo "<li class='active'>В начало</li>";
                for ($i=1; $i<=$pages;$i++){
                    if($i == $page+1)
                        echo "<li class='active'>".($page +1)."</li>" ;
                    else{
                        echo "<li><a href='product.php/".$product_page;
                        if($i!=1)
                            echo "?page=".($i-1);
                        echo "'>$i</a></li>";
                    }
                }

                if($page != $pages -1)
                    echo "<li><a href='product.php/".$product_page."?page=".($pages-1)."'>В конец</a></li>";
                else
                    echo "<li class='active'>В конец</li>";

                ?>
            </ul>
        </nav>

    </div>
    <?php
}

?>
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
<script src="js/custom.js"></script>
</body>
</html>
