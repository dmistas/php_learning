<?php
    require_once('config.php');
    require_once('resize.php');

//    запрос к БД
    function execute_query($sql) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Connection error");
        $result = mysqli_query($db, $sql);
        mysqli_close($db);
        return $result;
    }

//    заполнение DB по массиву имен изображений
    function execute_arr_query($arr) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Connection error");
        foreach ($arr as $item) {
            $sql = "INSERT INTO galary (name, path_small, path, viewed) values " .
                "('$item', '" . THUMBNAIL_DIR . "$item', '" . IMG_DIR . "$item', '0')";
            $result = mysqli_query($db, $sql);
            
        }
        mysqli_close($db);
        return $result;
    }

//    запрос к БД и получение массива данных
    function getResult($sql) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Connection error");
        $result = mysqli_query($db, $sql);
        
        $array_result = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $array_result[] = $row;
        }
        
        mysqli_close($db);
        return $array_result;
    }


//    очистка папки
    function clear_dir($dir) {
        if (file_exists($dir)) {
            foreach (glob($dir . '/*') as $file) {
                unlink($file);
            }
        }
        return true;
    }

//    получение изображений из директории
    function scanDirectory($directory) {
        $files = scandir($directory);
        $images = [];
        foreach ($files as $file) {
            if (!is_dir($file)) {
                $images[] = $file;
                
            }
        }
        return $images;
    }