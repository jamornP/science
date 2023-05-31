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
   
    
    <section class="min-vh-100">
        <div class="container">
            <div class="card mt-3">
                <div class="container">
                    <span class="badge rounded-pill bg-primary mt-3 shadow text-truncate">
                        <h4 class="fs-20"><b>&nbsp;&nbsp;&nbspกิจกรรมงานวันวิทยาศาสตร์ ปี 2566&nbsp;&nbsp;</b></h4>
                    </span>
                    <p class="text-danger mt-2 fs-18"><b>หมายเหตุ : ในกรณีที่มีการส่งผลงานเข้าร่วมประกวดเข้ามาในระบบมากกว่า 1 ครั้ง</b><b class='text-primary'>(กรณี สมัครซ้ำ หรือท่านสามารถลบรายการที่สมัครซ้ำออกด้วยตัวท่านเองได้ ก่อนวันปิดรับสมัคร) </b><b>คณะวิทยาศาสตร์ขอสงวนสิทธิ์ในการพิจารณาเฉพาะผลงานในวันและเวลาล่าสุดเท่านั้น</b></p>
                    <div class="row">
                        <?php
                        $i = 0;
                        $activitys = $adminObj->getActivityAll("data");
                        foreach($activitys as $activity){
                            echo "
                            <div class='col-md-4 mt-4'>
                                <a href='{$activity['link']}'>
                                    <img src='/science/sciday/images/{$activity['images']}' class='d-block w-100 img-thumbnail shadow' alt='{$activity['name']}'>
                                </a>
                            </div>
                        ";
                        }
                        ?>
                        <!-- <div class='col-md-3 mt-4'>
                            <img src="/science/sciday/images/news10.png" class='d-block w-100 img-thumbnail' alt="...">
                        </div> -->
                    </div>
                    <br>
                </div>
            </div>
            <div class="mt5">
                <br>

            </div>
        </div>
        <br>
        <br>
        <br>
        </div>
    </section>
    


</body>

</html>