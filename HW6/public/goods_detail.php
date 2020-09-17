<?php include("../templates/header.php") ?>
    <div class="main-content">
        <?php
            include("../templates/menu.php");
            require_once("../models/function.php");
            if (isset($_GET['id'])){
                $id = (int)($_GET['id']);
            }
            $sql = sprintf("SELECT * FROM goods WHERE id = %s", $id);
            
            $good = getResult($sql);

        ?>
        <div class="goods">
            <div>
                <h3 class="goods-title"><?=$good[0]['title'];?></h3>
                <div class="goods-picture"><img src="img/<?=$good[0]['img'];?>" alt="<?=$good[0]['img'];?>"></div>

                <a href="#" class="btn buy">Купить</a>

            </div>
            <div>
                <div class="full-description">
                    <h3>О товаре</h3>
                    <p id = "full-description"> <?=$good[0]['description'];?></p>
                </div>
                <p>Цена: <span id="price"><?=$good[0]['price'];?></span> р.</p>

            </div>
        </div>
    </div>
<?php include "../templates/footer.php" ?>