<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 $activitys = $activityObj->getActivityById(1);
 $activity_name = $activitys['name'];
 use App\Model\Sciday\Artifact;
 $artifactObj = new Artifact;   
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
 use App\Model\Sciday\Showround;
 $showroundObj = new Showround;
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
<body class="font-prompt wave-bg">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <div class="container">
        <!-- <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1> -->
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
           
        </div>
        
        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3">
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="../artifact/form.php?activity=<?php echo $_REQUEST['activity'];?>" class="btn btn-lg btn-outline-success my-bottom">
                <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span> ยื่นใบสมัครแข่งขัน</a>
            </div>
            
            <figure class="">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-3 shadow">
                            <!-- coming soon... -->
                            <img src="/science/sciday/images/1.png" class="img-thumbnail rounded " alt="...">
                        </div>
                    </div>
                    <div class="col-md ">
                        <blockquote class="blockquote">
                            <h4 class="mt-3"><b>กำหนดการ</b></h4>
                        </blockquote>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover table-success shadow">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th width='70%'>รายละเอียด</th>
                                        <th width='30%'>วันที่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">เปิดระบบรับสมัคร</span> <br>
                                            - เอกสารหลักเกณฑ์การประกวด <a href="/science/sciday/document/artifact/หลักเกณฑ์การประกวดสิ่งประดิษฐ์ 2565.pdf" class="btn btn-sm btn-warning text-white mt-1" target='_blank'>Download </a><br>
                                            - ใบสมัคร <a href="/science/sciday/document/artifact/แบบฟอร์มสมัครสิ่งประดิษฐ์2565.pdf" class="btn btn-sm btn-warning text-white p-1" target='_blank'><i class='bx bxs-file-pdf'></i> pdf</a>
                                            &nbsp;<a href="/science/sciday/document/artifact/แบบฟอร์มสมัครสิ่งประดิษฐ์2565.docx" class=" btn btn-sm btn-warning text-white p-1" target='_blank'><i class='bx bxs-file-doc'></i> word</a>
                                            <br>
                                            กรอกใบสมัครแล้วยื่นสมัครทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> <br>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 15 มิ.ย. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-danger fs-20 shadow">ปิดระบบรับสมัคร</span> <br>
                                            - เวลา 23.59 น.
                                        </td>
                                        <td class="text-center">
                                            วันที่ 12  ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ประกาศรายชื่อทีมที่ผ่านเข้ารอบการประกวดรอบที่ 2</span> <br>
                                            - ผ่านช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> 
                                        </td>
                                        <td class="text-center">
                                            วันที่ 19 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">เปิดระบบแนบ Link video</span> <br>
                                            - สำหรับทีมที่ผ่านเข้ารอบที่ 2 ให้ผู้สมัครอัพคลิปลง Youtube แล้วส่งลิงค์เข้า ระบบของคณะ ที่ช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> 
                                        </td>
                                        <td class="text-center">
                                            วันที่ 19 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-danger fs-20 shadow">ปิดระบบแนบ Link video</span> <br>
                                            - เวลา 23.59 น.
                                        </td>
                                        <td class="text-center">
                                            วันที่ 27 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ประกาศรายชื่อผู้ผ่านเข้ารอบตัดสิน</span> <br>
                                            - ผ่านช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> 
                                        </td>
                                        <td class="text-center">
                                            วันที่ 15 ส.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">การประกวดรอบตัดสิน</span> <br>
                                            - เวลา 9.30 น. จัดแสดงผลงานและเข้าร่วมพิธีเปิดงานที่หอประชุมจุฬาภรณวลัยลักษณ์  ชั้น 1<br>
                                            <!-- - เวลา 11.00 น. ผู้สมัครนำเสนอผลงานต่อกรรมการ <br>
                                            - เวลา 13.00 น. กรรมการประชุมตัดสินผู้ได้รับรางวัล <br> -->
                                            - เวลา 15.30 น. ประกาศผลและรับรางวัล <br>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 24 ส.ค. 2565
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </figure>
        </div>
        
   
        <div class="tab-content  p-2 mb-5" id="myTabContent">
            <?php
                $show = $showroundObj->ShowByActivity(base64_decode($_REQUEST['activity']),1);
                if($show['showround']=='yes'){
                ?>
                <div class="d-flex justify-content-between">
                    <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
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
                                            
                                                $projects = $artifactObj->getArtifactByLevel($level['id']);
                                                $i=0;
                                                
                                                foreach($projects AS $project){
                                                    $stus = $studentObj->getStuById($project['student_id']);
                                                    $teachers = $teacherObj->getTeacherById($project['teacher_id']);
                                                    $i++;
                                                    $j=0;
                                                    $k=0;
                                                    $st="";
                                                    $tea="";

                                                    
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
                <?php
                }
            ?>
            <!-- round 2 -->
            <?php 
                $shows = $showroundObj->ShowByActivity(1,2); 
                if($shows['showround']=='yes'){?>
                <div class="d-flex justify-content-between">
                    <span class="badge rounded-pill bg-success mt-3 shadow">
                        <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 2&nbsp;&nbsp;&nbsp;</b></h3>
                        <?php 
                            // echo $level['id']."<br>";
                            echo base64_decode($_REQUEST['activity'])."<br>";
                            
                        ?>
                    </span>
                </div>
                <?php 
                
                    $levels = $levelObj->getLevelByActivity(base64_decode($_REQUEST['activity']));
                    foreach($levels AS $level){
                        
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow-sm p-3 mb-2 bg-white rounded mt-3 fs-20">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level['name']." ".$level['id'];?></div>
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
                                            $round2s = $roundObj->getRoundByLevel($level['id'],2,base64_decode($_REQUEST['activity']));
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
            <!-- round 3 -->
            <?php 
                $shows = $showroundObj->ShowByActivity(1,3); 
                if($shows['showround']=='yes'){?>
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
                                            $round3s = $roundObj->getRoundByLevel($level['id'],3,base64_decode($_REQUEST['activity']));
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