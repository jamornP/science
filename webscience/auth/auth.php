<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /science/webscience/auth/login.php");
        exit;
    }
?>