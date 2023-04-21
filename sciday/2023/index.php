<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
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
            width: 100%;
            margin: 0 auto;
        }
        #clock div
        {
            position: relative;
            
            width:80%;
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
            font-size: 32px;
            font-weight: 800;
            margin-top: -5px;
        }
        #clock div span:nth-child(2)
        {
            font-size: 18px;
            font-weight: 800;
            margin-top: 0px;
        }
    </style> 
</head>
<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar2023.php";?>
    <section class="min-vh-100">
    <div class="container">
    <img src="https://picsum.photos/id/866/1900/500" class="mt-2 img-fluid rounded mx-auto d-block" alt="...">
      
        <br>
        <div class="text-center">
           
                <div id="clock"></div>
            
        </div>
        <br>
    </div>
    </section>
    <section class="min-vh-100">
    <div class="">
        <div class="card bg-poster mt-5" >
            <div class="container">
                <span class="badge rounded-pill bg-primary mt-3 shadow text-truncate">
                    <h4 class=""><b>&nbsp;&nbsp;&nbspกิจกรรมงานวันวิทยาศาสตร์ ปี 2565&nbsp;&nbsp;</b></h4>
                </span>
                <div class="row mt-3 text-center">
                    <?php
                    $i=0;
                    $activitys = array(1,2,3,4,5,6);
                    for($i=0;$i<count($activitys);$i++){
                        
                        echo "
                            <div class='col-md-2 mt-4'>
                                
                                    <img src='/science/sciday/images/{$activitys[$i]}.png' class='d-block w-100 img-thumbnail' alt=''>
                                
                            </div>
                        ";
                    }
                    ?>
                    <!-- <div class='col-md-4 mt-4'>
                        <img src="/science/sciday/images/news10.png" class='d-block w-100 img-thumbnail' alt="...">
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
    </section>
    <script type="text/javascript">
        function countDown(){
            var timeA = new Date(); // วันเวลาปัจจุบัน
            // var timeB = new Date("Febriaru 24,2012 00:00:01"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
             var timeB = new Date(2023,7,4,7,0,0,0); 
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