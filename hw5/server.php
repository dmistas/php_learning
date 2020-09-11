<?php
    require_once('function.php');
    if (isset($_POST['path'])) {
        $q = "UPDATE galary SET viewed = viewed + 1 WHERE path='{$_POST['path']}'";
        execute_query($q);
        $a = "SELECT viewed FROM galary WHERE path = '{$_POST['path']}' ";
//        execute_query($a);
        $ans  =  getResult($a);
        echo $ans[0]['viewed'];
    }

// UPDATE galary SET viewed = viewed + 1 WHERE path = 'img/1.jpg'