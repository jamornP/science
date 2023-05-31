<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /science/sciday/2023/auth/login.php");
        exit;
    }
    
?>