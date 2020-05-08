<?php
    session_start();

    if (!isset($_SESSION['login_user']) && !isset($_SESSION['name_admin'])){
        header("location:login.php");
        die();
    }
?>