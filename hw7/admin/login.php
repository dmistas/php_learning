<?php
$connect = mysqli_connect("localhost", "root", "515298", "phpgb");
$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
$pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";
$sql = "select id from users where login = '$login' and pass = '$pass'";
$res = mysqli_query($connect, $sql) or die("Error: " . mysqli_error($connect));

if (mysqli_num_rows($res) == 1) {
    setcookie("login", $login, '/hw7/');
    setcookie("pass", $pass, '/hw7/');
    header("Location: ../admin/admin.php?success");
} else {
    header("Location: ../admin/admin.php");
}