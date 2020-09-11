<?php
    define("IMG_DIR", "img/");
    define("THUMBNAIL_DIR", "thumb/");
    require_once('function.php');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="font-size: 1.3em">
<form action="?" method="POST">
    <p>1</p>
    <input type="submit" name="sinc_thumb_img" value="Синхронизировать изображения и иконки"/>
    <br>
    <p>2</p>
    <input type="submit" name="sinc_db_img" value="Синхронизировать изображения и БД"/>

</form>

<?php
    //    проверяем совпадение папки с изображениями и иконками на совпадение, при различии
    //    перезаписываем все изображения в папке thumb
    if (isset($_POST['sinc_thumb_img'])) {
        $thumb = scanDirectory(THUMBNAIL_DIR);
        $img = scanDirectory(IMG_DIR);
        
        if (!($thumb == $img)) {
            echo "Найдены различия, очищаем папку thumb и генерируем изображения заново <br>";
            clear_dir(THUMBNAIL_DIR);
            foreach ($img as $file) {
                copy(IMG_DIR . $file, THUMBNAIL_DIR . $file) or die("Ошибка копирования файла");
                resize(THUMBNAIL_DIR . $file, 200);
            }
            echo "Выполнено";
        } else {
            echo "Различия не найдены";
        }
    }
    //    проверяем соответствие записей в БД фактическим изображениям в папке img, пропавшие удаляем из БД
    if (isset($_POST['sinc_db_img'])) {
        $img = scanDirectory(IMG_DIR);
        $pictures = getResult('SELECT * FROM galary');
        echo "<p>Массив из БД</p><pre>";
        print_r($pictures);
        echo "</pre>";
        echo "<hr>";
        print_r($img);
        echo "<hr>";
        foreach ($pictures as $picture) {
            if (!(in_array($picture['name'], $img))) {
                echo "not found " . $picture['name'] . "<br>";
                $qwery = "DELETE FROM galary WHERE name = '{$picture['name']}'";
                execute_query($qwery);
                echo "deleted" . $picture['name'] . "<br>";
            } else {
                echo "coincidence <br>";
//            если в БД есть изображение удаляем из массива $img
                if (($key = array_search($picture['name'], $img)) !== false) {
                    unset($img[$key]);
                }
            }
        }
        // если в массиве остались изображения добавляем их в БД
        if ($img) {
            execute_arr_query($img);
        }
    }
?>
</body>
</html>