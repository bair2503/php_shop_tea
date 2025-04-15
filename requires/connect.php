<?php
$link = @mysqli_connect('localhost' , 'root', 'root', 'tea_db' ) or die("Ошибка соединения с БД");
if(!$link) die(mysqli_connect_error());

mysqli_set_charset($link, "utf8") or die("Не установлена кодеровка");



