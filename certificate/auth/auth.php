<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /science/certificate/auth/login.php");
        exit;
    }
    
?>