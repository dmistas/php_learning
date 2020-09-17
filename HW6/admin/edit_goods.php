<?php
    include "../models/function.php";
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if (isset($_GET['id'])) {$id = (int)$_GET['id'];}
        
        if ($action == "delete") {
            $sql = "delete from goods where id=$id";
            if (execute_query($sql)) {
                header("Location: admin.php");
            }


        } elseif ($action == "edit") {
            $sql = "SELECT * FROM goods WHERE id=$id";
            $good = getResult($sql);
            if ($_POST["title"]) {$title = $_POST["title"];} else { $title = $good[0]["title"];}
            if ($_POST["price"]) {$price = $_POST["price"];} else { $price = $good[0]["price"];}
            if ($_POST["description"]) {$description = $_POST["description"];} else { $description = $good[0]["description"];}

            if ($_FILES["photo"]["name"]){
                $img = $_FILES["photo"]["name"];
                require_once("resize.php");
                $path_small = "../public/img/small/" . $_FILES['photo']['name'];
                $path = "../public/img/" . $_FILES['photo']['name'];
                if (copy($_FILES['photo']['tmp_name'], $path)) {
                    echo "Файл загружен!<br>";
                } else {
                    echo "Ошибка при загрузке файла<br>";
                }
                resize($_FILES['photo']['tmp_name'], 200);
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $path_small)) {
                    echo "Уменьшенная копия создана!<br>";
                } else {
                    echo "Ошибка при загрузке уменьшенного файла<br>";
                }
            } else { $img = $good[0]["img"];}

            $sql = "UPDATE goods SET title = '{$title}', price = '{$price}', img = '{$img}', description = '{$description}' WHERE id=$id";
            if (execute_query($sql)) {
                echo "Данные обновлены";
                echo "<a href=\"admin.php\">вернуться</a>";
            }
            
            
        }
        elseif ($action == "add"){
            if ($_POST["title"]) {$title = $_POST["title"];} else { die("ошибка в POST данных");}
            if ($_POST["price"]) {$price = $_POST["price"];} else { die("ошибка в POST данных");}
            if ($_POST["description"]) {$description = $_POST["description"];} else { die("ошибка в POST данных");}
            if ($_FILES["photo"]){
                $img = $_FILES["photo"]["name"];
                require_once("resize.php");
                $path_small = "../public/img/small/" . $_FILES['photo']['name'];
                $path = "../public/img/" . $_FILES['photo']['name'];
                if (copy($_FILES['photo']['tmp_name'], $path)) {
                    echo "Файл загружен!<br>";
                } else {
                    echo "Ошибка при загрузке файла<br>";
                }
                resize($_FILES['photo']['tmp_name'], 200);
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $path_small)) {
                    echo "Уменьшенная копия создана!<br>";
                } else {
                    echo "Ошибка при загрузке уменьшенного файла<br>";
                }
            }
    
            $sql = "INSERT INTO goods (title, price, img, description) VALUES ('{$title}', '{$price}', '{$img}', '{$description}')";
            if (execute_query($sql)) {
                echo "Товар добавлен";
                echo "<a href=\"admin.php\">вернуться</a>";
            }
        }
    }
?>