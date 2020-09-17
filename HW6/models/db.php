<?php
    require_once("function.php");
    
    $goods = getResult('SELECT * FROM `goods`');
    
    $fbs = getResult('SELECT * FROM `feedback`');