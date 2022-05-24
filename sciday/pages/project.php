<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <div class="container">
        <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1>
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $_REQUEST['activity'];?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
           
        </div>
        
        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3">
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="../project/form.php?activity=<?php echo $_REQUEST['activity'];?>" class="btn btn-lg btn-outline-success my-bottom"><span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span> สมัครแข่งขัน</a>
            </div>
        
            <figure class="">
                <blockquote class="blockquote">
                    <h4 class="mt-3"><b>กำหนดการ</b></h4>
                </blockquote>
                <figcaption class="blockquote-footer fs-18">
                <?php echo $_REQUEST['activity'];?>
                </figcaption>
            </figure>
        </div>
        
        
    </div>
</body>
</html>