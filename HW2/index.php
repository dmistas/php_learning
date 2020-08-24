<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к уроку №2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div>1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать
    скрипт, который работает по следующему принципу:

    если $a и $b положительные, вывести их разность;
    если $а и $b отрицательные, вывести их произведение;
    если $а и $b разных знаков, вывести их сумму;

    ноль можно считать положительным числом.
</div>
<?php
    $a = 5;
    $b = 4;
    if ($a > 0 && $b > 0) {
        echo($a - $b);
    } elseif ($a < 0 && $b < 0) {
        echo $a * $b;
    } elseif (($a > 0 && $b < 0) || ($a < 0 && $b > 0)) {
        echo $a + $b;
    }
    echo "<br>";
    echo ($a > 0 && $b > 0) ? ($a - $b) : "";
    echo ($a < 0 && $b < 0) ? ($a * $b) : "";
    echo (($a > 0 && $b < 0) || ($a < 0 && $b > 0)) ? ($a + $b) : "";
?>
<hr>
<div>
    2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a
    до 15.
</div>
<?php
    $a = 6;
    switch ($a) {
        case 1:
            echo "1<br>";
        case 2:
            echo "2<br>";
        case 3:
            echo "3<br>";
        case 4:
            echo "4<br>";
        case 5:
            echo "5<br>";
        case 6:
            echo "6<br>";
        case 7:
            echo "7<br>";
        case 8:
            echo "8<br>";
        case 9:
            echo "9<br>";
        case 10:
            echo "10<br>";
        case 11:
            echo "11<br>";
        case 12:
            echo "12<br>";
        case 13:
            echo "13<br>";
        case 14:
            echo "14<br>";
        case 15:
            echo "15<br>";
        
    }
?>
<hr>
<div>
    3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
    Обязательно использовать оператор return.
</div>
<?php
    function sum($a, $b) {
        return $a + $b;
    }
    
    function sub($a, $b) {
        return $a - $b;
    }
    
    function mult($a, $b) {
        return $a * $b;
    }
    
    function divn($a, $b) {
        if ($b == 0) {
            return ("На 0 делить нельзя!");
        }
        return $a / $b;
    }
    
    echo sum(1, 2) . "<br>";
    echo sub(5, 3) . "<br>";
    echo mult(2, 2) . "<br>";
    echo divn(4, 0) . "<br>";
?>
<hr>
<div>
    4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
    где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного
    значения операции выполнить одну из арифметических операций (использовать функции из пункта 3)
    и вернуть полученное значение (использовать switch).
</div>

<?php
    function mathOperation($arg1, $arg2, $operation) {
        switch ($operation) {
            case "сложение":
                return sum($arg1, $arg2);
            case "вычитание":
                return sub($arg1, $arg2);
            case "умножение":
                return mult($arg1, $arg2);
            case "деление":
                return divn($arg1, $arg2);
        }
        return "Error";
    }
    
    echo mathOperation(3, 2, "вычитание");
?>

<hr>
<div>
    5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон,
    вывести текущий год в подвале при помощи встроенных функций PHP.
</div>
<?php
    $nowYear = date("Y");
    echo $nowYear;
?>
<hr>
<div>
    6. *С помощью рекурсии организовать функцию возведения числа в степень.
    Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
</div>
<?php
    function power($val, $pow) {
        if ($pow < 1) {
            return "Задайте степень больше или равную 1";
        }
        if ($pow == 1) {
            return $val;
        } else {
            return $val * power($val, $pow - 1);
        }
        
    }
    
    echo power(2, 3);
?>

<hr>
<div>
    7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями,
    например:
    <div>
        22 часа 15 минут
        21 час 43 минуты
    </div>
</div>
<?php
    function ending($num, $hm = "minute") {
//            1 - час/минута
//            2 по 4 - часа/минуты
//            5 по 10 - часов/минут
//            11 по 19 - часов/минут
        
        $n = $num % 10;
        if (($num > 10) && ($num < 20)) {
            $case = 3;
        } elseif ($n == 1) {
            $case = 1;
        } elseif ($n == 0) {
            $case = 3;
        } elseif (($n > 1) && ($n < 5)) {
            $case = 2;
        } elseif (($n >= 5) && ($n <= 9)) {
            $case = 3;
        } else {
            $case = 1;
        }
        switch ($case) {
            case 1:
                return ($hm == "hour") ? "час" : "минута";
            case 2:
                return ($hm == "hour") ? "часа" : "минуты";
            case 3:
                return ($hm == "hour") ? "часов" : "минут";
        }
        return "Error";
    }
    
    
    function timeNow() {
        $hours = date("H");
        $minutes = date("i");
        return "$hours " . ending($hours, "hour") . " " . "$minutes " . ending($minutes);
    }
    
    echo(timeNow());

?>


</body>

</html>
