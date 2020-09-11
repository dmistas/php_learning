<?php
    require_once('function.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
    <SCRIPT type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></SCRIPT>
    <script>
        $(document).ready(function () { // Ждём загрузки страницы

            $("img").click(function () {	// Событие клика на маленькое изображение
                var img = $(this);	// Получаем изображение, на которое кликнули
                var src_small = img.attr('src'); // Достаем из этого изображения путь до картинки
                var src = src_small.replace("thumb/", "img/")
                console.log(src);
                console.log(img.siblings()[0].firstElementChild.innerHTML);
                $.post('server.php', {path: src}, function (data) {
                    $(img.siblings()[0].firstElementChild).html(data);
                    console.log(data);
                    console.log('work');
                });
                $("body").append("<div class='popup'>" + //Добавляем в тело документа разметку всплывающего окна
                    "<div class='popup_bg'></div>" + // Блок, который будет служить фоном затемненным
                    "<img src=" + src + " class='popup_img' />" + // Само увеличенное фото
                    "</div>");
                $(".popup").fadeIn(800); // Медленно выводим изображение
                $(".popup_bg").click(function () {	// Событие клика на затемненный фон
                    $(".popup").fadeOut(800);	// Медленно убираем всплывающее окно
                    setTimeout(function () {	// Выставляем таймер
                        $(".popup").remove(); // Удаляем разметку высплывающего окна
                    }, 800);
                });
            });

        });
    </script>
</head>
<body>
<?php
    $pictures = getResult('SELECT * FROM galary ORDER BY viewed DESC');
?>
<div class="container">
    <div class="wrap">
        <?php foreach ($pictures as $picture): ?>
            <div class="image">
                <img src="<?= $picture['path_small'] ?>" alt="photo">
                <p>views: <span class="views"><?= $picture['viewed'] ?></span></p>
            </div>
        <?php
        endforeach;
        ?>

    </div>
</div>
</body>
</html>