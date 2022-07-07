<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 ?>
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
    <?php //print_r($_SESSION);?>
    <div class="container">
        <div class="mt-1">
            <img src="/science/sciday/images/into.png" class="img-fluid rounded" alt="...">
        </div>
        <br>
        <div class="card  shadow">
            <div class="card-header bg-warning">
            <h2 class="card-title text-center"><b>ขอเชิญร่วมงาน</b></h2>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-2">
                    <a href="/science/sciday/images/0.png" target="_blank"> <img src="/science/sciday/images/0.png" class="img-fluid rounded shadow" alt="..."></a>
                </div>
                <div class="col-md">
                    <p class="card-text fs-16" style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยในวันที่ ๑๘ สิงหาคม ของทุกปีเป็นวันวิทยาศาสตร์แห่งชาติ คณะวิทยาศาสตร์ สจล. จึงได้จัดงานนิทรรศการ
                        วันวิทยาศาสตร์ ประจำปี ๒๕๖๕ ในหัวข้อ <b>“Science for every Generation”</b> เพื่อเป็นการเทิดพระเกียรติพระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ ๔ ผู้ทรงเป็นพระบิดาแห่งวิทยาศาสตร์ไทย และเพื่อกระตุ้นให้นักเรียนนักศึกษา ประชาชนทั่วไปได้ตระหนักถึงความสำคัญของวิทยาศาสตร์และเทคโนโลยีที่มีต่อการพัฒนาคุณภาพชีวิตและการพัฒนาประเทศ โดยได้จัดกิจกรรมเพื่อให้นักเรียน นักศึกษา และคณาจารย์ได้มีส่วนร่วมในการทำกิจกรรมด้าน
                        วิทยาศาสตร์ เช่น การประกวดโครงงานวิทยาศาสตร์ การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์ การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ และการเสวนาแนะนำหลักสูตรของคณะวิทยาศาสตร์ สจล. 
                    </p>
                    
                
                </div>
                </div>
                
                
                
                <!-- <div class="text-center mt-3">
                    <a href="/science/sciday/document/รายละเอียดนิทรรศการวันวิทยาศาสตร์  2565.pdf" class="btn btn-primary text-center">ดาวน์โหลดเอกสารเชิญชวน</a>
                </div> -->
                
            </div>
            <div class="card-footer text-center">
                <a href="/science/sciday/document/รายละเอียดนิทรรศการวันวิทยาศาสตร์  2565.pdf" class="btn btn-primary text-center fs-20" target='_blank'>ดาวน์โหลดเอกสารเชิญชวน</a>
            </div>
        </div>
        
        <h3>
        </h3>
        <div class="text-center">
            <a href=""></a>
        <!-- <h1>Science Day 2022</h1> -->
        </div>
        
    </div>
    <div class="">
        <div class="card bg-poster mt-5" >
            <div class="container">
                <span class="badge rounded-pill bg-primary mt-3 shadow text-truncate">
                    <h2 class=""><b>&nbsp;&nbsp;&nbsp;&nbspกิจกรรมงานวันวิทยาศาสตร์ ปี 2565&nbsp;&nbsp;&nbsp;&nbsp</b></h2>
                </span>
                <div class="row mt-3 text-center">
                    <?php
                    $activitys = $activityObj->getActivityByYear('2022');
                    foreach($activitys AS $activity){
                        $activity_id=base64_encode($activity['id']);
                        echo "
                            <div class='col-md-4 mt-4'>
                                <a href='{$activity['link']}?activity={$activity_id}'>
                                    <img src='/science/sciday/images/{$activity['id']}.png' class='d-block w-100 img-thumbnail' alt='{$activity['name']}'>
                                </a>
                            </div>
                        ";
                    }
                    ?>
                    <!-- <div class="col-md-5">
                            
                    </div> -->
                    <!-- <div class="col-md-4 ">
                        <div id="carouselExampleInterval" class="carousel slide  shadow" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="3000">
                                <img src="/science/sciday/images/1.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="3000">
                                <img src="/science/sciday/images/2.png" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="/science/sciday/images/3.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-5">
                        
                    </div> -->
                </div>
            </div>
            <div class="mt5">
                <br>
                <br>
                <br>
            </div>
        </div>
        
    </div>
</body>
</html>