<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 use App\Model\Sciday\Level;
 $levelObj = new Level; 
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
<div class="container">
        <div class="mt-2 card shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3>สรุปทีมที่สมัคร กิจกรรงานวันวิทยาศาสตร์ 2022 </h3><b id="showDate"></b>
                <div class="fs-14 text-danger" id="showRemain"></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                        $activitys = $activityObj->getActivityByYear('2022');
                        foreach($activitys AS $activity){
                            $activity_id=base64_encode($activity['id']);
                            
                            
                            ?>
                            
                                <div class='col-md-4 mt-2'>
                                    <div class='d-flex position-relative'>
                                        <!-- <div class="w-75"> -->
                                            <img src='/science/sciday/images/<?php echo $activity['id'].".png";?>' class='flex-shrink-0 me-3 w-50 shadow mb-5 ' alt=''>
                                        <!-- </div> -->
                                        
                                        
                                        <div class='w-100'>
                                            <h5 class='text-center mt-0'>จำนวนทีมที่สมัคร</h5>
                                            <div class='text-center mt-0 '>
                                                <?php
                                                    $levels = $levelObj->getLevelByActivity($activity['id']);
                                                    foreach($levels AS $level){
                                                        switch ($activity['id']) {
                                                            case 1:
                                                              $sql="SELECT * FROM tb_artifact WHERE level_id=".$level['id'];
                                                              $remark="";
                                                              break;
                                                            case 2:
                                                              $sql="SELECT * FROM tb_project WHERE level_id=".$level['id'];
                                                              $remark="";
                                                              break;
                                                            case 3:
                                                              $sql="SELECT * FROM tb_iot WHERE level_id=".$level['id'];
                                                              $remark="";
                                                              break;
                                                            case 4:
                                                              $sql="SELECT * FROM tb_answer WHERE level_id=".$level['id'];
                                                              $remark="";
                                                              break;
                                                            case 5:
                                                              $sql="SELECT * FROM tb_esports";
                                                              
                                                              break;
                                                            case 6:
                                                              $sql="SELECT * FROM tb_micro WHERE level_id=".$level['id'];
                                                              $remark="";
                                                              break;
                                                        }
                                                        $count=$activityObj->getAllByActivity($sql);
                                                        $level_id= base64_encode($level['id']);
                                                        echo "
                                                            <a class='text-decoration-none' href='{$activity['committee']}?level={$level_id}'>
                                                                <p class='border bg-primary text-white fs-16 text-primary'>{$level['name']}</p>
                                                            </a>
                                                            <p class='fs-16 text-primary'>{$count}</p>
                                                        ";

                                                        
                                                    }
                                                    if($activity['id']==5){
                                                        echo "
                                                        <br>
                                                        <br>
                                                        <br>
                                                            <p class='mt-2 fs-16 text-warning'>หมายเหตุ จำนวนทีมที่สมัครอยู่ที่ชมรม Esports</p>
                                                        ";
                                                    }
                                                ?>
                                                
                                                
                                                
                                                
                                            </div>   
                                            <!-- <h5 class='text-center mt-0'>ทีม</h5> -->
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function countDown(){
            var timeA = new Date(); // วันเวลาปัจจุบัน
            // var timeB = new Date("Febriaru 24,2012 00:00:01"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
             var timeB = new Date(2022,6,13,0,0,1,0); 
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
                var showPart=document.getElementById('showRemain');
                var showDate=document.getElementById('showDate');
                showDate.innerHTML=timeA;
                showPart.innerHTML="เหลือเวลา "+wan+" วัน "+hour+" ชั่วโมง "
                +minute+" นาที "+second+" วินาที"; 
                    if(wan==0 && hour==0 && minute==0 && second==0){
                        clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
                        // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
                    }
            }
        }
        // การเรียกใช้
        var iCountDown=setInterval("countDown()",1000); 
    </script>
</body>

</html>