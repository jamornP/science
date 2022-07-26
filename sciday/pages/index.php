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
    <style>
        .center
        {
            position : absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            text-align: center;
            font-weight: 800;
        }
        #clock
        {
            display: flex;
            width: 490px;
            margin: 0 auto;
        }
        #clock div
        {
            position: relative;
            
            width:120px;
            padding:20px;
            margin: 0 5px;
            background: #262626;
            color: #fff;
            border: 2px solid #000;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.50) !important;
        }
        #clock div:last-child
        {
            background: #e91e63;
            
        }
        #clock div:before
        {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: rgba(255,255,255,.2);
        }
        #clock div span
        {
            display: block;
            text-align: center;
        }
        #clock div span:nth-child(1)
        {
            font-size: 48px;
            font-weight: 800;
        }
        #clock div span:nth-child(2)
        {
            font-size: 18px;
            font-weight: 800;
            margin-top: -10px;
        }
    </style> 
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php //print_r($_SESSION);?>
    <div class="container">
        
        
        <div class="card shadow mt-1">
            <div class="card-body">
                <div class="row">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                            <img src="/science/sciday/images/news05.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                            <img src="/science/sciday/images/news00.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                            <img src="/science/sciday/images/news01.png" class="d-block w-100" alt="...">
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
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <!-- <h1>Science for every Generation</h1> -->
            <!-- <div class="texe-center"> -->
                <div id="clock"></div>
            <!-- </div> -->
        </div>
        <br>
        <div class="card  shadow">
            <div class="card-header bg-info">
                <h2 class="card-title text-white">
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <b> ข่าวประชาสัมพันธ์ </b>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </h2>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news05.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">ประกาศรายชื่อผู้ที่ผ่านเข้ารอบ</h5>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                    <span class="visually-hidden">New alerts</span>
                                    </span>
                                </button>
                                <p class="card-text mt-2">
                                    คลิกดูรายละเอียดที่กิจกรรมได้เลยครับผม
                                </p>
                                <p class="card-text mt-4 text-primary">
                                1. <a href="/science/sciday/pages/artifact.php?activity=MQ==" class="text-primary">การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์</a> <br>
                                2. <a href="/science/sciday/pages/iot.php?activity=Mw==" class="text-primary">การประกวดโครงงาน IoT</a> <br>
                                3. <a href="/science/sciday/pages/answer.php?activity=NA==" class="text-primary">การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์</a> <br>
                                <!-- 4. <a href="/science/sciday/pages/micro.php?activity=Ng==" class="text-primary">การแข่งขัน micro:bit</a> <br> -->
                                </p>
                                
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 26 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news04.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary position-relative">
                                    <h5 class="card-title">เลื่อนการปิดรับสมัคร</h5>
                                    <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                        New    
                                    <span class="visually-hidden">New alerts</span> -->
                                    </span>
                                </button>
                                <p class="card-text mt-4 text-primary">
                                1. <a href="/science/sciday/pages/artifact.php?activity=MQ==" class="text-primary">กิจกรรมการประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์</a> <br>
                                2. <a href="/science/sciday/pages/iot.php?activity=Mw==" class="text-primary">กิจกรรมการประกวดโครงงาน IoT</a> <br>
                                3. <a href="/science/sciday/pages/answer.php?activity=NA==" class="text-primary">กิจกรรมการแข่งขันตอบปัญหาฯ ภาษาอังกฤษ</a> <br>
                                4. <a href="/science/sciday/pages/micro.php?activity=Ng==" class="text-primary">กิจกรรมการแข่งขัน micro:bit</a> <br>
                                </p>
                                <p class="card-text">
                                    จากเดิม วันที่ 12 ก.ค. 2565 เป็น <b class="text-danger">วันที่ 22 ก.ค. 2565</b> รีบๆสมัครกันเข้ามานะครับผม
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 12 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news01.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                
                                <!-- <a href="/science/sciday/pages/project.php?activity=Mg==" class=""> -->
                                    <button type="button" class="btn btn-primary position-relative">
                                        <h5 class="card-title">ชิงถ้วยพระราชทาน</h5>
                                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                            New    
                                        <span class="visually-hidden">New alerts</span> -->
                                        </span>
                                    </button>
                                <!-- </a> -->
                                <p class="card-text mt-4">
                                
                                    โค้งสุดท้ายสำหรับรับสมัครกิจกรรมงานวันวิทยาศาสตร์<br>
                                    &nbsp;&nbsp;&nbsp;1. กิจกรรมการประกวดโครงงานวิทยาศาสตร์<br>
                                    &nbsp;&nbsp;&nbsp;2. กิจกรรมการประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์<br>
                                    <b class="text-primary fs-18">&nbsp;&nbsp;&nbsp;ชิงถ้วยพระราชทาน สมเด็จพระกนิษฐาธิราชเจ้า กรมสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี</b><br>
                                    และยังมีกิจกรรมอื่นๆอีกมากมายให้ได้ชิงเงินรางวัลพร้อมเกียรติบัตร ติดตามรายละเอียดได้ที่หัวข้อกิจกรรมได้เลยครับน้องๆ<br>
                                    รีบๆสมัครกันเข้ามานะครับผม...
                                    
                                    
                                </p>
                                <!-- <div class="text-end">
                                    <a href="/science/sciday/pages/project.php?activity=Mg==" class="">รายละเอียดเพิ่มเติม</a>
                                </div> -->
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 8 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-success">
                            <img src="/science/sciday/images/news02.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                
                                <a href="/science/sciday/pages/project.php?activity=Mg==" class="">
                                    <button type="button" class="btn btn-primary position-relative">
                                        <h5 class="card-title">เลื่อนการปิดรับสมัคร</h5>
                                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">   
                                            New    
                                        <span class="visually-hidden">New alerts</span> -->
                                        </span>
                                    </button>
                                </a>
                                <p class="card-text mt-4">
                                    กิจกรรมการประกวดโครงงานวิทยาศาสตร์<br>
                                    จากเดิม วันที่ 8 ก.ค. 2565 เป็น <b class="text-primary">วันที่ 20 ก.ค. 2565</b> 
                                </p>
                                <div class="text-end">
                                    <a href="/science/sciday/pages/project.php?activity=Mg==" class="">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted text-end">Post date : 8 ก.ค. 2565</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card  shadow">
            <div class="card-header bg-primary">
                <h2 class="card-title text-center text-white"><b>ขอเชิญร่วมงาน</b></h2>
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
    <div class="">
        <div class="card bg-poster mt-5" >
            <div class="container">
                <span class="badge rounded-pill bg-primary mt-3 shadow text-truncate">
                    <h4 class=""><b>&nbsp;&nbsp;&nbspกิจกรรมงานวันวิทยาศาสตร์ ปี 2565&nbsp;&nbsp;</b></h4>
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
                   
                </div>
            </div>
            <div class="mt5">
                <br>
                <br>
                <br>
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
        function countDown(){
            var timeA = new Date(); // วันเวลาปัจจุบัน
            // var timeB = new Date("Febriaru 24,2012 00:00:01"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
             var timeB = new Date(2022,8,23,9,0,0,0); 
            // วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
            // เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
            var timeDifference = timeB.getTime()-timeA.getTime();    
            if(timeDifference>=0){
                timeDifference=timeDifference/1000;
                timeDifference=Math.floor(timeDifference);
                var wan=Math.floor(timeDifference/86400);
                var l_wan=timeDifference%86400;
                var hour=Math.floor(l_wan/3600);
                var l_hour=l_wan%3600;
                var minute=Math.floor(l_hour/60);
                var second=l_hour%60;
                var showPart=document.getElementById('clock');
                // var showDate=document.getElementById('showDate');
                // var btn=document.getElementById("clock");
                // showDate.innerHTML=timeA;
                showPart.innerHTML=" "
                +'<div><span>'+wan+'</span><span>Days</span></div>'
                +'<div><span>'+hour+'</span><span>Hr</span></div>'
                +'<div><span>'+minute+'</span><span>Min</span></div>'
                +'<div><span>'+second+'</span><span>Sec</span></div>'
                ; 
                    if(wan==0 && hour==0 && minute==0 && second==0){
                        // btn.hidden;
                        clearInterval(iCountDown);
                        location.reload();
                         // ยกเลิกการนับถอยหลังเมื่อครบ
                        // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
                    }
            }
        }
        // การเรียกใช้
        var iCountDown=setInterval("countDown()",1000); 
    </script>
</body>
</html>