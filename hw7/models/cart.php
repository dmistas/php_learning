<?php
//print_r( $_GET);
//Array ( [id] => 1 [action] => buy )
require "function.php";
$sql = "SELECT * FROM cart WHERE goods_id = $_GET[id]";
$is_good_in_cart = getResult($sql);
$sql = ($is_good_in_cart)?"UPDATE cart SET quantity = quantity + 1 WHERE goods_id = $_GET[id]":
    "INSERT INTO cart (goods_id, quantity) VALUES ($_GET[id], 1)";
$add_to_cart = execute_query($sql);
echo ($add_to_cart)?"Товар добавлен в корзину":"Ошибка при добавлении товара";  ?>
<a href="../public/cart_list.php">Перейти к корзине</a>
<a href="../public/catalog.php">Вернуться в каталог</a>


