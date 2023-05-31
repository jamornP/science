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

        <div class="card">
            <h5 class="card-header bg-170">Featured</h5>
            <div class="card-body">
                <?php
                $id = base64_decode($_GET['id']);
                    $ckDelP = $adminObj->delProjectById($id);
                    $ckDelI = $adminObj->delImagesById($id);
                    $ckDelS = $adminObj->delStudentById($id);
                    $ckDelT = $adminObj->delTeacherById($id);
                    if($ckDelP AND $ckDelI AND $ckDelS AND $ckDelT){
                        echo "  
                            <script type='text/javascript'>
                                setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=del_ok'} , 0);
                            </script>
                        ";
                    }else{
                        echo "  
                            <script type='text/javascript'>
                                setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=error'} , 0);
                            </script>
                        ";
                    }
                    
                ?>
            </div>
        </div>


    </div>


</body>

</html>