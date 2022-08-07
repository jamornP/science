<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /science/car/auth/login.php");
        exit;
    }
?>