<?php
print_r($_POST);

//for($i=0;$i<count($_FILES['photo']['name']);$i++){
//    $path = "files/".$_FILES['photo']['name'][$i];
//    if(move_uploaded_file($_FILES['photo']['tmp_name'][$i],$path)){
//        echo $_FILES['photo']['name'][$i]." успешно загружен!<br>";
//    }
//    else{
//        die("Ошибка!");
//    }
//}

/*
if($_POST['answer'] == $_POST['correct']-1){
    echo "welcome!";
}
else{
    echo "Доступ закрыт!";
}*/

//print_r($_GET);
/*
$fio = (!empty($_POST['fio'])) ? strip_tags($_POST['fio']) : "";
echo $fio;

/*
$id = (int)$_GET['id'];
$sql = "select * from table where id =1;delete from table";
*/
/*
$str = "delete from table ";
trim($str);*/