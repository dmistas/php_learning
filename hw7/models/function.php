<?php
    require_once("config.php");
    
    //    запрос к БД
    function execute_query($sql) {
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Connection error");
        $result = mysqli_query($db, $sql);
        mysqli_close($db);
        return $result;
    }
    
    //    запрос к БД и получение массива данных
    function getResult($sql) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $db = mysqli_connect(HOST, USER, PASS, DB) or die("Connection error");
        $result = mysqli_query($db, $sql);
    
        $array_result = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $array_result[] = $row;
        }
    
        mysqli_close($db);
        return $array_result;
    }
    