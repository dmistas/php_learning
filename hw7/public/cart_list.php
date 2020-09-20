<?php
require "../models/function.php";
$sql = "SELECT * FROM phpgb.cart
JOIN phpgb.goods ON cart.goods_id = goods.id";
$goods = getResult($sql);
foreach ($goods as $good): ?>
<div class="cart-wrap">
    <h2 class="cart-title"><?= $good["title"] ?></h2>
    <img class="cart-img" src="img/small/<?= $good["img"] ?>" alt="Photo">
    <div class="short-description">
        <h3>О товаре</h3>
        <p id="short-description"><?= mb_strimwidth($good["description"], 0, 50) . "..." ?></p>
    </div>
    <p>Цена: <span id="price"> <?= $good["price"] ?></span> р.</p>
    <p>Количество: <span> <?= $good["quantity"]  ?></span></p>
    <p>Общая стоимость <span> <?= $good["price"]*$good["quantity"]  ?></span></p>

</div>
<?php endforeach;