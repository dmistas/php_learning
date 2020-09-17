<?php include("../templates/header.php") ?>
    <div class="main-content">
        <?php include("../templates/menu.php"); ?>
        <?php require_once("../models/db.php"); ?>
        <div class="goods">
            <?php if (isset($goods)) {
                foreach ($goods as $good):?>
                    <div class="goods-wrap">
                        <div>
                            <h2 class="goods-title"><?= $good["title"] ?></h2>
                            <div class="goods-picture"><img src="img/small/<?= $good["img"] ?>" alt="Photo"></div>
                            <a href="#" class="btn buy">Купить</a>

                        </div>
                        <div>
                            <div class="short-description">
                                <h3>О товаре</h3>
                                <p id="short-description"><?= mb_strimwidth($good["description"], 0, 50) . "..." ?></p>
                            </div>
                            <p>Цена: <span id="price"> <?= $good["price"] ?></span> р.</p>
                            <a href="goods_detail.php?id=<?= $good["id"]?>" class="btn detailed">Подробнее</a>
                        </div>
                    </div>
                <?php endforeach;
            } ?>
        </div>
    </div>
<?php include "../templates/footer.php" ?>