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

<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php //print_r($_SESSION);
    ?>
    <div class="container mt-5">
        <?php
            for($i=1;$i<347;$i++){
               echo "
                <div class='card mt-2'>
                    <h5 class='card-header bg-{$i}'>Featured {$i}</h5>
                    <div class='card-body'>

                    </div>
                </div>
               ";
            }
        ?>

    </div>


</body>

</html>