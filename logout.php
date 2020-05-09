<?php
    session_start();

    if ($_SESSION['login_user']){
        unset($_SESSION['login_user']);
        header("location:login.php");
    }
    elseif ($_SESSION['name_admin']){
        unset($_SESSION['name_admin']);
        header("location:login.php");
    }
?>
