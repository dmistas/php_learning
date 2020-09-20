<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Калькулятор</title>
</head>
<body>
<div class="result" style="font-size: 1.3em">
    <?php
    function sum($a, $b)
    {
        return $a + $b;
    }

    function sub($a, $b)
    {
        return $a - $b;
    }

    function mult($a, $b)
    {
        return $a * $b;
    }

    function divn($a, $b)
    {
        if ($b == 0) {
            return ("На 0 делить нельзя!");
        }
        return $a / $b;
    }

    function mathOperation($arg1, $arg2, $operation)
    {
        switch ($operation) {
            case "+":
                return sum($arg1, $arg2);
            case "-":
                return sub($arg1, $arg2);
            case "*":
                return mult($arg1, $arg2);
            case "/":
                return divn($arg1, $arg2);
        }
        return "Error";
    }
    $result = "";
    if (isset($_POST['math_op'])) {
        $math_op = $_POST['math_op'];
    }
    if (isset($_POST['x']) && isset($_POST['y']) && isset($_POST['math_op'])) {

        $result =  mathOperation($_POST['x'], $_POST['y'], $math_op);
    }
    ?>
</div>


<form action="" method="post">
    <div style="display: flex">
        <div style="margin: 0 10px"><p>Введите первое число</p>
            <input type="text" name="x" value="<?php if (isset($_POST['x'])) echo $_POST['x'];?>">
        </div>
        <div style="margin: 0 10px">
            <p>Операция</p>
            <input type="text" name="math_op" value="<?php if (isset($_POST['math_op'])) echo $_POST['math_op'];?>">
        </div>
        <div style="margin: 0 10px">
            <p>Введите второе число</p>
            <input type="text" name="y" value="<?php if (isset($_POST['y'])) echo $_POST['y'];?>">
        </div>
        <div style="margin: 0 10px">
            <p>Результат</p>
            <input type="text" name="result" value="<?= $result ?>">
        </div>
        <div style="margin: 0 10px">

            <input type="submit" value="вычислить">
        </div>
    </div>
</form>

</body>
</html>
