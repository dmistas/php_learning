<?php include("../templates/header.php") ?>
    <div class="main-content">
        <?php include("../templates/menu.php"); ?>
        <?php require_once("../models/db.php"); ?>
        <div class="feedbacks">
            <?php if (isset($fbs)) {
                foreach ($fbs as $fb):?>

                    <div>
                        <h4><?= $fb["fio"] ?></h4>
                        <p><?= $fb["e-mail"] ?></p>
                        <p><?= $fb["comment"] ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="make-fb">
                    <form action="../models/make-fb.php" method="post">
                        <p>Ваше имя</p>
                        <input required type="text" name="fio" >
                        <p>Ваш e-mail</p>
                        <input type="email" name="e-mail">
                        <p>Ваш отзыв</p>
                        <textarea required name="fedback" cols="30" rows="10"></textarea>
                        <div><input type="submit" value="Отправить"></div>
                    </form>
                </div>
            
            
            <?php } ?>
        </div>
    </div>
<?php include "../templates/footer.php" ?>