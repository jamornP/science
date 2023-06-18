<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php //print_r($_SESSION);
    ?>
    <div class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-170">รูป</h5>
            <div class="card-body">
                <?php
                    $pics = $adminObj->getImageById($_GET['id']);
                    foreach($pics as $pic){
                        echo "
                            <img src='{$pic['path']}' class='img-thumbnail rounded mx-auto d-block' alt='...'><br>
                        ";
                    } 
                ?>
            </div>
        </div>


    </div>


</body>

</html>