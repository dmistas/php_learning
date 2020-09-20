<?php

if (isset($_GET['success']) && isset($_COOKIE['login']) && $_COOKIE['login']=='admin'):?>
    <h1>Ваша учетная запись подтверждена!</h1>
    <?php
    require_once("../models/function.php");

    $goods = getResult('SELECT * FROM `goods`');
    ?>
    <div style="max-width: 1100px; margin: 0 auto">
        <?php
        if (isset($_GET["action"])) {
            if ($_GET["action"] == "add"):?>

                <form method="post" action="edit_goods.php?action=add" enctype="multipart/form-data">
                    <h3 class="goods-title">Название товара</h3><br>
                    <input required type="text" name="title" maxlength="100" placeholder="Название товара">
                    <p>Стоимость товара</p>
                    <input required type="text" name="price" maxlength="20">
                    <p>Загрузить новую картинку</p>
                    <input type="file" name="photo" accept="image/jpeg, image/png, image/gif">
                    <h3>О товаре</h3>
                    <textarea required name="description" cols="100" rows="10"
                              placeholder="Введите описание товара"></textarea>
                    <p><input type="submit" name="submit" value="Сохранить..."></p>

                </form>
                <a href="admin.php">Назад</a>

            <?php endif;

        } elseif (isset($_GET["id"])) {
            $id = (int)$_GET["id"];
            $good = getResult("SELECT * FROM `goods` WHERE id=$id");
            ?>
            <div class="goods">
                <form method="post" action="edit_goods.php?action=edit&id=<?= $id ?>" enctype="multipart/form-data">
                    <h3 class="goods-title">Название товара</h3><br>
                    <p><?= $good[0]['title']; ?></p>
                    <input required type="text" name="title" maxlength="100" value="<?= $good[0]['title']; ?>">
                    <p>Стоимость товара</p>
                    <input required type="text" name="price" maxlength="20" value="<?= $good[0]['price']; ?>">
                    <p>Изображение</p>
                    <div class="goods-picture"><img style="max-width: 200px" src="../public/img/<?= $good[0]['img']; ?>"
                                                    alt="<?= $good[0]['img']; ?>"></div>
                    <p>Загрузить новую картинку</p>
                    <input type="file" name="photo" accept="image/jpeg, image/png, image/gif">
                    <h3>О товаре</h3>
                    <p id="full-description"> <?= $good[0]['description']; ?></p>
                    <textarea required name="description" cols="100" rows="10"><?= $good[0]['description'] ?></textarea>
                    <p><input type="submit" name="submit" value="Сохранить..."></p>

                </form>
                <a href="admin.php">Назад</a>
            </div> <?php
        } else { ?>
            <a style="display: inline-block; margin: 5px 20px;padding: 8px;color: white; background-color: green; text-decoration: none"
               href="admin.php?action=add">Добавить товар</a>
            <?php

            foreach ($goods as $good):?>
                <div class="good">
                    <p>Наименование товара: <?= $good["title"] ?></p>
                    <img style="max-width: 200px" src="../public/img/small/<?= $good["img"] ?>"
                         alt="<?= $good["img"] ?>">
                    <p>Описание товара: <?= $good["description"] ?></p>
                    <p>Цена товара: <?= $good["price"] ?></p>
                    <a style="margin: 5px 20px"
                       href="admin.php?id=<?= $good["id"] ?>">Редактировать</a>
                    <a style="margin: 5px 20px" href="edit_goods.php?action=delete&id=<?= $good["id"] ?>">Удалить
                        товар</a>
                </div>
            <?php endforeach;
        }
        ?>
    </div>
<?php

else:
$vl = (isset($_COOKIE['login'])) ? $_COOKIE['login'] : "";
$vp = (isset($_COOKIE['pass'])) ? $_COOKIE['pass'] : "";

?>
<form action="../admin/login.php" method="post">
    <p>Ваш логин</p>
    <input type="text" name="login" value="<?= $vl ?>">
    <p>Ваш пароль</p>
    <input type="password" name="pass" value="<?= $vp ?>">
    <input type="submit" value="Войти">
</form>
<?php
endif;