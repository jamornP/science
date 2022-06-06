<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 $activitys = $activityObj->getActivityById(base64_decode($_REQUEST['activity']));
 $activity_name = $activitys['name'];
 use App\Model\Sciday\Project;
 $projectObj = new Project;   
 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Level;
 $levelObj = new Level;   
 use App\Model\Sciday\Round;
 $roundObj = new Round;
 use App\Model\Sciday\Student;
 $studentObj = new Student;  
use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;    
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
        <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1>
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
           
        </div>
        
        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3">
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="../project/form.php?activity=<?php echo $_REQUEST['activity'];?>" class="btn btn-lg btn-outline-success my-bottom"><span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span> สมัครแข่งขัน</a>
            </div>
            
            <figure class="">
                
                <div class="mt-1">
                    <img src="/science/sciday/images/poster-project.png" class="img-fluid rounded " alt="...">
                </div>
                <blockquote class="blockquote">
                    <h4 class="mt-3"><b>กำหนดการ</b></h4>
                </blockquote>
                <div class=" fs-18 border">
                    <div class="row mt-3 p-3 border-bottom fs-20 fw-bolder">
                        <div class="col-lg-3 ">
                        วันที่
                        </div>
                        <div class="col-lg-2">
                        เวลา
                        </div>
                        <div class="col-lg-7">
                        รายละเอียด
                        </div>
                    </div>
                    <div class="row mt-3 p-3 border-bottom ">
                        <div class="col-lg-3">
                        วันพุธที่ 15 มิ.ย. 65
                        </div>
                        <div class="col-lg-2">
                        เวลา 12.00 น.
                        </div>
                        <div class="col-lg-7">
                        การประกวดรอบที่ 1 <span class="badge rounded-pill bg-success"> เปิดระบบรับสมัคร </span> ส่งใบสมัคร 1 ชุดต่อ 1 โครงงาน ความยาวไม่เกิน 5 หน้ากระดาษ A4  <br>
                        <a href="/science/sciday/document/project/เอกสารแนบ2ใบสมัครการประกวดโครงงานวิทยาศ.pdf" class="btn btn-md btn-success text-white" target='_blank'>Download ใบสมัคร</a> กรอกใบสมัครแล้วยื่นสมัครทาง <a href="" class=""> http://sciday.kmitl.ac.th</a><br>
                        <a href="/science/sciday/document/project/เอกสารแนบ1หลักเกณฑ์การประกวดโครงงานวิทย.pdf" class="btn btn-md btn-warning text-white mt-1" target='_blank'>Download </a> เอกสารหลักเกณฑ์การประกวดโครงงานวิทยาศาสตร์
                        </div>
                    </div>
                    <div class="row mt-3 p-3 border-bottom ">
                        <div class="col-lg-3">
                        วันพฤหัสบดีที่ 30 มิ.ย. 65
                        </div>
                        <div class="col-lg-2">
                        เวลา 24.00 น.
                        </div>
                        <div class="col-lg-7">
                        ปิดระบบสมัคร
                        </div>
                    </div>
                    <div class="row mt-3 p-3 border-bottom">
                        <div class="col-lg-3">
                        วันจันทร์ที่ 11 ก.ค. 65
                        </div>
                        <div class="col-lg-2">
                        เวลา 15.00 น.

                        </div>
                        <div class="col-lg-7">
                        ประกาศรายชื่อผู้ผ่านการประกวดรอบที่ 1  
                        <a href="" class="">http://sciday.kmitl.ac.th</a>

                        </div>
                    </div>
                    <div class="row mt-3 p-3 border-bottom">
                        <div class="col-lg-3">
                        วันอังคารที่ 12 ก.ค. 65
                        </div>
                        <div class="col-lg-2">
                        เวลา 12.00 น.

                        </div>
                        <div class="col-lg-7">
                        การประกวดรอบที่ 2 เปิดระบบให้ผู้ผ่านการคัดเลือก
                        รอบที่ 1 โดยให้ผู้สมัครอัพคลิปลง Youtube แล้วส่งลิงค์เข้า
                        ระบบของคณะ <a href="" class="">http://sciday.kmitl.ac.th</a>

                        </div>
                    </div>
                    <div class="row mt-3 p-3 border-bottom">
                        <div class="col-lg-3">
                        วันพุธที่ 27 ก.ค. 65 
                        </div>
                        <div class="col-lg-2">
                        เวลา 24.00 น.

                        </div>
                        <div class="col-lg-7">
                        ปิดระบบการส่งไฟล์วิดีทัศน์ 

                        </div>
                    </div>
                    <div class="row mt-3 p-3 border-bottom">
                        <div class="col-lg-3">
                        วันจันทร์ที่ 15 ส.ค.65 
                        </div>
                        <div class="col-lg-2">
                        เวลา 15.00 น.

                        </div>
                        <div class="col-lg-7">
                        ประกาศรายชื่อผู้ผ่านเข้ารอบตัดสิน 
                        <a href="" class="">http://sciday.kmitl.ac.th</a> 

                        </div>
                    </div>
                    <div class="row mt-3 p-3 ">
                        <div class="col-lg-3">
                        วันอังคารที่ 23 ส.ค. 65 
                        </div>
                        <div class="col-lg-2">
                        เวลา 9.30 น.

                        </div>
                        <div class="col-lg-7">
                        การประกวดรอบตัดสิน ผู้ผ่านการประกวดรอบที่ 2 จัดแสดงผลงานและเข้าร่วมพิธีเปิดงานที่หอประชุมจุฬาภรณวลัยลักษณ์

                        </div>
                    </div>
                    <div class="row mt-3 p-3">
                        <div class="col-lg-3">
                         
                        </div>
                        <div class="col-lg-2">
                        เวลา 11.00 น.
                        </div>
                        <div class="col-lg-7">
                        ผู้สมัครนำเสนอผลงานต่อกรรมการ

                        </div>
                    </div>
                    <div class="row mt-3 p-3">
                        <div class="col-lg-3">
                         
                        </div>
                        <div class="col-lg-2">
                        เวลา 13.00 น.
                        </div>
                        <div class="col-lg-7">
                        กรรมการประชุมตัดสินผู้ได้รับรางวัล

                        </div>
                    </div>
                    <div class="row mt-3 p-3">
                        <div class="col-lg-3">
                         
                        </div>
                        <div class="col-lg-2">
                        เวลา 15.30 น.
                        </div>
                        <div class="col-lg-7">
                        ประกาศผลและรับรางวัล 

                        </div>
                    </div>
                </div>
            </figure>
        </div>
        
   
        <div class="tab-content  p-2 mb-5" id="myTabContent">
            <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> -->
                <div class="d-flex justify-content-between">
                    <span class="badge rounded-pill bg-warning mt-3 shadow">
                        <h3><b>&nbsp;&nbsp;&nbsp;โรงเรียนที่สมัครแข่งขันแล้ว&nbsp;&nbsp;&nbsp;</b></h3>
                    </span>
                </div>
                <?php
                
                
                    $levels = $levelObj->getLevelByActivity(base64_decode($_REQUEST['activity']));
                    foreach($levels AS $level){
                        
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow-sm p-3 mb-2 bg-white rounded mt-3 fs-20">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัคร <?php echo $level['name']; ?></div>
                                <table class="table table-striped table-hover fs-20">
                                    <thead>
                                        <tr>
                                            <th width='10%'>#</th>
                                            <th width='40%'>โรงเรียน</th>
                                            <th width='25%'>นักเรียน</th>
                                            <th width='25%'>อาจารย์ที่ปรึกษา</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-14">
                                        
                                        <?php 
                                        
                                            $projects = $projectObj->getProjectByLevel($level['id']);
                                            $i=0;
                                            
                                            foreach($projects AS $project){
                                                $stus = $studentObj->getStuById($project['student_id']);
                                                $teachers = $teacherObj->getTeacherById($project['teacher_id']);
                                                $i++;
                                                $j=0;
                                                $k=0;
                                                $st="";
                                                $tea="";

                                                if($round['link_video']==""){
                                                    $show_link="";
                                                }else{
                                                    $show_link="<a href='{$round['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>";
                                                }
                                                foreach($stus AS $stu){
                                                    $j++;
                                                    $st .=$j.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname']."<br>";
                                                }
                                                foreach($teachers AS $teacher){
                                                    $k++;
                                                    $tea .=$k.". ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname']."<br>";
                                                }
                                                echo "
                                                    <tr>
                                                        <td width='10%'>{$i}</td>
                                                        <td width='40%'>{$project['school']}</td>
                                                        <td width='25%'>{$st}</td>
                                                        <td width='25%'>{$tea}</td>
                                                        
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php                
                        }
                ?>
            <!-- </div> -->
            <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
            <?php if(1){?>
                <div class="d-flex justify-content-between">
                    <span class="badge rounded-pill bg-success mt-3 shadow">
                        <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 2&nbsp;&nbsp;&nbsp;</b></h3>
                    </span>
                </div>
                <?php 
                
                    $levels = $levelObj->getLevelByActivity(base64_decode($_REQUEST['activity']));
                    foreach($levels AS $level){
                        
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow-sm p-3 mb-2 bg-white rounded mt-3 fs-20">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level['name'];?></div>
                                <table class="table table-striped table-hover fs-20">
                                    <thead>
                                        <tr>
                                            <th width='10%'>#</th>
                                            <th width='40%'>โรงเรียน</th>
                                            <th width='25%'>นักเรียน</th>
                                            <th width='25%'>อาจารย์ที่ปรึกษา</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-14">
                                        
                                        <?php 
                                            $round2s = $roundObj->getRound2ByLevel($level['id']);
                                            $i=0;
                                            foreach($round2s AS $round2){
                                                $stu2s = $studentObj->getStuById($round2['student_id']);
                                                $teacher2s = $teacherObj->getTeacherById($round2['teacher_id']);
                                                $i2++;
                                                $j2=0;
                                                $k2=0;
                                                $st2="";
                                                $tea="";
                                                if($round2['link_video']==""){
                                                    $show_link="";
                                                }else{
                                                    $show_link="<a href='{$round2['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>";
                                                }
                                                // ค้นหานักเรียน
                                                foreach($stu2s AS $stu2){
                                                    $j2++;
                                                    $st2 .=$j2.". ".$stu2['stitle'].$stu2['sname']." ".$stu2['ssurname']."<br>";
                                                }
                                                // ค้นหาชื่ออาจารย์ที่ปรึกษา
                                                foreach($teacher2s AS $teacher2){
                                                    $k2++;
                                                    $tea2 .=$k2.". ".$teacher2['ttitle'].$teacher2['tname']." ".$teacher2['tsurname']."<br>";
                                                }
                                                echo "
                                                    <tr>
                                                        <td width='8%'>{$i2}.</td>
                                                        <td width='20%'>{$round2['school']}</td>
                                                        <td width='20%'>{$st2}</td>
                                                        <td width='15%'>{$tea2}</td>
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php                
                        }
                ?>
            <?php } ?>
            <!-- </div> -->
            <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
            <?php if(1){?>
                <div class="d-flex justify-content-between">
                    <span class="badge rounded-pill bg-success mt-3 shadow">
                        <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 3&nbsp;&nbsp;&nbsp;</b></h3>
                    </span>
                </div>
                <?php 
                
                    $levels = $levelObj->getLevelByActivity(base64_decode($_REQUEST['activity']));
                    foreach($levels AS $level){
                        
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow-sm p-3 mb-2 bg-white rounded mt-3 fs-20">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level['name'];?></div>
                                <table class="table table-striped table-hover fs-20">
                                    <thead>
                                        <tr>
                                            <th width='10%'>#</th>
                                            <th width='40%'>โรงเรียน</th>
                                            <th width='25%'>นักเรียน</th>
                                            <th width='25%'>อาจารย์ที่ปรึกษา</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-14">
                                        
                                        <?php 
                                            $round3s = $roundObj->getRound3ByLevel($level['id']);
                                            $i=0;
                                            foreach($round3s AS $round3){
                                                $stu3s = $studentObj->getStuById($round3['student_id']);
                                                $teacher3s = $teacherObj->getTeacherById($round3['teacher_id']);
                                                $i3++;
                                                $j3=0;
                                                $k3=0;
                                                $st3="";
                                                $tea="";
                                                if($round3['link_video']==""){
                                                    $show_link="";
                                                }else{
                                                    $show_link="<a href='{$round3['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>";
                                                }
                                                // ค้นหานักเรียน
                                                foreach($stu3s AS $stu3){
                                                    $j3++;
                                                    $st3 .=$j3.". ".$stu3['stitle'].$stu3['sname']." ".$stu3['ssurname']."<br>";
                                                }
                                                // ค้นหาชื่ออาจารย์ที่ปรึกษา
                                                foreach($teacher3s AS $teacher3){
                                                    $k3++;
                                                    $tea3 .=$k3.". ".$teacher3['ttitle'].$teacher3['tname']." ".$teacher3['tsurname']."<br>";
                                                }
                                                echo "
                                                    <tr>
                                                        <td width='8%'>{$i3}.</td>
                                                        <td width='20%'>{$round3['school']}</td>
                                                        <td width='20%'>{$st3}</td>
                                                        <td width='15%'>{$tea3}</td>
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php                
                        }
                ?>
            <?php } ?>
        </div>
       
        
        
    </div>
</body>
</html>