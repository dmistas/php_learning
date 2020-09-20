<?php

if (isset($_GET['success']) && isset($_COOKIE['pass'])):?>
    <h1>Ваша учетная запись подтверждена!</h1>
<?php
endif;
$vl = (isset($_COOKIE['login']))?$_COOKIE['login']:"";
$vp = (isset($_COOKIE['pass']))?$_COOKIE['pass']:"";

?>
<form action="../admin/login.php" method="post">
    <p>Ваш логин</p>
    <input type="text" name="login" value="<?= $vl ?>">
    <p>Ваш пароль</p>
    <input type="password" name="pass" value="<?=$vp?>">
    <input type="submit" value="Войти">
</form>