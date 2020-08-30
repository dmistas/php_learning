<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <SCRIPT type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></SCRIPT>
    <script>
        $(document).ready(function () { // Ждём загрузки страницы

            $(".image").click(function () {	// Событие клика на маленькое изображение
                var img = $(this);	// Получаем изображение, на которое кликнули
                var src_small = img.attr('src'); // Достаем из этого изображения путь до картинки
                var src = src_small.replace("img_small/", "img/")
                console.log(src);
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
<div class="container">
<div>
<h2>Задание 1</h2>
<?php include("task1.php") ?>
</div>
<div>
<h2>Задание 2-3</h2>
<?php include("task2_3.php") ?>
</div>
<div style="clear: both">
    <meta charset="UTF-8">
    <form action="task_ext.php" method="post" enctype="multipart/form-data">
        <p>Загрузить файл</p>
        <input type="file" name="photo"><br><br>
        <input type="submit" value="Сохранить">
    </form>
</div>
</div>
</body>

</html>