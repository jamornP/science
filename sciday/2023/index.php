<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>
    <style>
        .center {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            text-align: center;
            font-weight: 800;
        }

        #clock {
            display: flex;
            width: 100%;
            margin: 0 auto;
        }

        #clock div {
            position: relative;

            width: 80%;
            padding: 20px;
            margin: 0 5px;
            background: #262626;
            color: #fff;
            border: 2px solid #000;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.50) !important;
        }

        #clock div:last-child {
            background: #e91e63;

        }

        #clock div:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: rgba(255, 255, 255, .2);
        }

        #clock div span {
            display: block;
            text-align: center;
        }

        #clock div span:nth-child(1) {
            font-size: 32px;
            font-weight: 800;
            margin-top: -5px;
        }

        #clock div span:nth-child(2) {
            font-size: 18px;
            font-weight: 800;
            margin-top: 0px;
        }

        /*  */
        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(33.333%);
        }

        .carousel-inner .carousel-item-left.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-33.333%);
        }

        .carousel-inner .carousel-item {
            transition: transform 1.5s ease;
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left {
            transform: translateX(0);
        }

        body {
            background-color: #444444;
        }

        #pad {
            padding-left: 5px;
            padding-right: 5px;
        }

        .color-1 {
            background-color: rgb(255, 140, 140);
        }

        .color-2 {
            background-color: rgb(255, 205, 140);
        }

        .color-3 {
            background-color: rgb(173, 255, 140);
        }

        .color-4 {
            background-color: rgb(140, 186, 255);
        }

        .color-5 {
            background-color: rgb(194, 140, 255);
        }

        .bordered {
            border: rgb(220, 220, 220) medium solid;
            border-radius: 10px;
            padding: 5px 5px 5px 5px;
            height: 10rem;
        }

        .overlay {
            z-index: 1;
            padding: 0;
            border: none;
            /* background: rgba(68, 68, 68, 0.5); */
        }
    </style>
    <style>
        .div_news {
            /* width: 50px; */
            height: 700px;
            /* background-color: green; */
            /* overflow:auto; */
        }

        .card_news {
            /* width: 50px; */
            height: 120px;
            /* background-color: green; */
            overflow: auto;
        }
    </style>
</head>

<body class="font-kanit">
    
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php $indexs = $adminObj->getIndex(); ?>
    <!-- <section class="min-vh-100"> -->
        <div class="container-fluid">
            <img src="/science/sciday/images/<?php echo $indexs[0]['img_head'];?>" class="mt-2 img-fluid rounded mx-auto d-block shadow" alt="...">
            <!-- <iframe width="100%" height="700" class="embed-responsive-item mt-2 shadow" src="https://www.youtube.com/embed/SbVQsw4y6zk?autoplay=1" allowfullscreen></iframe> -->
            <br>
            <div class="container">
                <div class="text-center">

                    <div id="clock"></div>

                </div>
            </div>

            <br>

        </div>
    <!-- </section> -->
    <br>
    <?php
        $carousels = $adminObj->getCarouselShow();
        if(count($carousels)>0){
        ?>
        <div class="container">
            <div class="card  shadow">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            foreach($carousels as $ca){
                                if($ca['active']){
                                    $active = "active";
                                }else{
                                    $active = "";
                                }
                                echo "
                                    <div class='carousel-item {$active}'>
                                        <img src='/science/sciday/images/{$ca['img_path']}' class='d-block w-100' alt='...'>
                                    </div>
                                ";
                            }
                        ?>
                        
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
            </div>
        </div>
        <?php } 
    ?>
    <br>
    <div class="container">
        <div class="card  shadow">
            <div class="card-header bg-primary">
                <h2 class="card-title text-center text-white"><b>ขอเชิญร่วมงาน</b></h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <a href="/science/sciday/images/<?php echo $indexs[0]['img_poster'];?>" target="_blank"> <img src="/science/sciday/images/<?php echo $indexs[0]['img_poster'];?>" class="img-fluid rounded shadow" alt="..."></a>
                    </div>
                    <div class="col-md ">
                        <p class="card-text fs-16 mt-2" style="text-align: justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยในวันที่ 18 สิงหาคม ของทุกปีเป็นวันวิทยาศาสตร์แห่งชาติ คณะวิทยาศาสตร์ สจล. จึงได้จัดงานนิทรรศการ
                            วันวิทยาศาสตร์ ประจำปี 2566 ในหัวข้อ <b>“Science Today is Technology Tomorrow”</b> เพื่อเป็นการเทิดพระเกียรติพระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ 4 ผู้ทรงเป็นพระบิดาแห่งวิทยาศาสตร์ไทย และเพื่อกระตุ้นให้นักเรียนนักศึกษา ประชาชนทั่วไปได้ตระหนักถึงความสำคัญของวิทยาศาสตร์และเทคโนโลยีที่มีต่อการพัฒนาคุณภาพชีวิตและการพัฒนาประเทศ โดยได้จัดกิจกรรมเพื่อให้นักเรียน นักศึกษา และคณาจารย์ได้มีส่วนร่วมในการทำกิจกรรมด้าน
                            วิทยาศาสตร์ เช่น การประกวดโครงงานวิทยาศาสตร์ การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์ การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ และ Open House & workshop ของคณะวิทยาศาสตร์ สจล.
                        </p>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-primary" href="/science/upload/sciday/file2023/project-649015d5d12c1.pdf">ดาวน์โหลดเอกสารเชิญชวน</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <div class="spinner-grow text-success fs-20" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-success fs-20" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfK7bqwjacNIwNDQsTmFAN0fcdHh6IeiIHcwA8HqbUr30vYcg/viewform" class="btn btn-primary text-center fs-20 bg-200" target='_blank'>ลงทะเบียนเข้าเยี่ยมชมนิทรรศการวันวิทยาศาสตร์ คณะวิทยาศาสตร์ สจล.</a>
                <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden"></span>
                </div>
                <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- <section class="min-vh-100"> -->
    <div class="container">
        <div class="card  shadow">
            <div class="card-header bg-112">
                <h2 class="card-title text-white">
                    <!-- <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden"></span>
                    </div> -->
                    <b> ข่าวประชาสัมพันธ์ </b>
                    <!-- <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden"></span>
                    </div> -->
                </h2>
            </div>
            <div class="card-body">

                <div class="row ">
                    <div class="col-lg-6 col-md-6 text-center">
                        <?php echo "{$indexs[0]['youtube']}";?>
                        
                        <!-- <iframe width="100%" height="400" class="embed-responsive-item mt-2" src="https://www.youtube.com/embed/SbVQsw4y6zk?autoplay=1" allowfullscreen></iframe> -->
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <div class="div_news" data-bs-spy="scroll">
                            <?php
                            $news = $adminObj->getNewsAll("data");
                            // echo $news[0]['n_detail'];
                            $i = 0;
                            foreach ($news as $n) {
                                $text_title = nl2br($n['n_title']);
                                $text_detail = nl2br($n['n_detail']);
                                $i++;
                                if ($i == 5) {
                                    echo "
                                                    <div class='d-grid gap-2 d-md-flex justify-content-md-end mt-2'>
                                                        <a href='/science/sciday/2023/pages/news' class='' >ข่าวทั้งหมด</a>
                                                    </div>
                                                ";
                                } elseif ($i < 5) {
                                    echo "
                                                    <div class='card  mt-1 '>
                                                        <div class='card-header  bg-primary text-white'>
                                                            {$text_title} <i class='fs-10'>({$n['n_date']})</i>
                                                        </div>
                                                        <div class='card-body fs-14 card_news'>
                                                            <p class='mb-0'>{$text_detail}</p>
                                                ";
                                    $downlons = $adminObj->getDownloadById("data", $n['d_id']);
                                    $j = 0;
                                    foreach ($downlons as $d) {
                                        $j++;
                                        echo "
                                                        <a href='{$d['d_link']}' class='text-primary me-mr-2' style='text-decoration: none;' target='_blank'>{$j}.<i class='bx bx-file' ></i>  {$d['d_name']}</a><br>
                                                    ";
                                    }
                                    if ($n['n_link'] == "-") {
                                        echo "
                                                        </div>
                                                    </div>
                                                    ";
                                    } else {
                                        echo "            
                                                            
                                                            <br>
                                                            <a href='{$n['n_link']}' class='btn btn-sm btn-warning fs-12' target='_blank'>รายละเอียด...</a>    
                                                            
                                                        </div>
                                                    </div>
                                                ";
                                    }
                                } else {
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- </section> -->
    <br>
    <!-- <section class="min-vh-100"> -->
   
    <!-- </section> -->
    <hr>
    <section class="min-vh-100">
        <div class="container">
            <div class="card  bg-190">
                <div class="container">
                    <span class="badge rounded-pill bg-primary mt-3 shadow text-truncate">
                        <h5 class=""><b>&nbsp;&nbsp;&nbspกิจกรรมงานวันวิทยาศาสตร์ ปี 2566&nbsp;&nbsp;</b></h5>
                    </span>
                    <div class="row">
                    <p class="text-danger mt-2 fs-18"><b>หมายเหตุ : ในกรณีที่มีการส่งผลงานเข้าร่วมประกวดเข้ามาในระบบมากกว่า 1 ครั้ง</b><b class='text-primary'>(กรณี สมัครซ้ำ ท่านสามารถลบรายการที่สมัครซ้ำออกด้วยตัวท่านเองได้ ก่อนวันปิดรับสมัคร) </b><b>คณะวิทยาศาสตร์ขอสงวนสิทธิ์ในการพิจารณาเฉพาะผลงานในวันและเวลาล่าสุดเท่านั้น</b></p>
                    <br>
                    <h4 class="mt-3">สามารถคลิกดูรายระเอียดเพิ่มเติม ที่รูปได้</h4> 
                        <?php
                        $i = 0;
                        $activitys = $adminObj->getActivityAll("data");
                        foreach ($activitys as $activity) {
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

    <script type="text/javascript">
        function countDown() {
            var timeA = new Date(); // วันเวลาปัจจุบัน
            // var timeB = new Date("Febriaru 24,2012 00:00:01"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
            var timeB = new Date(2023, 7, 4, 0, 0, 0, 0);
            // วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
            // เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
            var timeDifference = timeB.getTime() - timeA.getTime();
            if (timeDifference >= 0) {
                timeDifference = timeDifference / 1000;
                timeDifference = Math.floor(timeDifference);
                var wan = Math.floor(timeDifference / 86400);
                var l_wan = timeDifference % 86400;
                var hour = Math.floor(l_wan / 3600);
                var l_hour = l_wan % 3600;
                var minute = Math.floor(l_hour / 60);
                var second = l_hour % 60;
                var showPart = document.getElementById('clock');
                // var showDate=document.getElementById('showDate');
                // var btn=document.getElementById("clock");
                // showDate.innerHTML=timeA;
                showPart.innerHTML = " " +
                    '<div><span>' + wan + '</span><span>Days</span></div>' +
                    '<div><span>' + hour + '</span><span>Hr</span></div>' +
                    '<div><span>' + minute + '</span><span>Min</span></div>' +
                    '<div><span>' + second + '</span><span>Sec</span></div>';
                if (wan == 0 && hour == 0 && minute == 0 && second == 0) {
                    // btn.hidden;
                    clearInterval(iCountDown);
                    location.reload();
                    // ยกเลิกการนับถอยหลังเมื่อครบ
                    // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
                }
            }
        }
        // การเรียกใช้
        var iCountDown = setInterval("countDown()", 1000);
    </script>
<!-- Messenger ปลั๊กอินแชท Code -->
<div id="fb-root"></div>

<!-- Your ปลั๊กอินแชท code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "145367872869812");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v17.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
</body>

</html>