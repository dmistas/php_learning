<?php
    include_once("function.php");
    $fio = (!empty($_POST['fio'])) ? strip_tags($_POST['fio']) : "";
    $email = (!empty($_POST['e-mail'])) ? strip_tags($_POST['e-mail']) : "";
    $feedback = (!empty($_POST['fedback'])) ? strip_tags($_POST['fedback']) : "";
    
    $t = "INSERT INTO feedback (fio, `e-mail`, comment) VALUES ('%s','%s','%s')";
    $sql = sprintf($t, $fio, $email, $feedback);
    execute_query($sql);
    header("Location: ../public/feedbacks.php");
    