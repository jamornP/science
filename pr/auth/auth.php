<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /science/pr/auth/login.php");
        exit;
    }
?>