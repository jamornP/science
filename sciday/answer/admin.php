<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
use App\Model\Sciday\Level;
$levelObj = new Level;
$levels = $levelObj->getLevelById(base64_decode($_REQUEST['level']));   
$level_name = $levels['name'];
use App\Model\Sciday\Title;
$titleObj = new Title;   
use App\Model\Sciday\Activity;
$activityObj = new Activity; 
$activitys = $activityObj->getActivityById(4);
$activity_name = $activitys['name'];
use App\Model\Sciday\Answer;
$answerObj = new Answer;  
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
    <title>Sciday 2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
  

</head>

<body class="font-prompt fs-18">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="text-end p-2">
                        <a href="/science/sciday/export/answer.php?level_id=<?php echo base64_decode($_REQUEST['level']);?>" class="text-end btn btn-success text-white"><i class='bx bx-file' ></i> Excel</a>
                    </div>
                    
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัครการแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ ( <?php echo $level_name; ?> )</div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th width='8%'>#</th>
                                <th width=''>โรงเรียน</th>
                                <th width='20%'>นักเรียน</th>
                                <th width='20%'>อาจารย์ที่ปรึกษา</th>
                                <th width='10%'>เบอร์ติดต่อ</th>
                                <th width='10%'>เอกสาร</th>
                                
                            </tr>
                        </thead>
                        <tbody class="fs-14">
                            <?php 
                                $answers = $answerObj->getAnswerByLevel(base64_decode($_REQUEST['level']));
                                $i=0;
                                
                                foreach($answers AS $answer){
                                    $stus = $studentObj->getStuById($answer['student_id']);
                                    $teachers = $teacherObj->getTeacherById($answer['teacher_id']);
                                    $i++;
                                    $j=0;
                                    $k=0;
                                    ?>
                                   
                                        <tr>
                                            <td width='8%'><?php echo $i; ?>.</td>
                                            <td width='20%'><?php echo $answer['school']; ?></td>
                                            <td width='20%'>
                                                <?php 
                                                    foreach($stus AS $stu){
                                                        $j++;
                                                        echo $j.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname']."<br>";
                                                    }
                                                ?>
                                            </td>
                                            <td width='15%'>
                                                <?php 
                                                    foreach($teachers AS $teacher){
                                                        $k++;
                                                        echo $k.". ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname']."<br>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $answer['tel']; ?></td>
                                            <td width='10%'><a href='/science/upload/sciday/file/<?php echo $answer['file_register']; ?>' target='_blank'>Download</a></td>
                                            
                                        </tr>
                                    
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <!-- Round 2 -->
         <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;รายชื่อผู้ผ่านการคัดเลือก&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัครการแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์  ( <?php echo $level_name;?> )</div>
                    <form action="save1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th width=''>โรงเรียน</th>
                                    <th width='20%'>นักเรียน</th>
                                    <th width='20%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='10%'>เบอร์ติดต่อ</th>
                                    <th width='10%'></th>
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id2' value='<?php echo $_SESSION['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id2' value='<?php echo base64_decode($_REQUEST['level']);?>'>
                                <!-- <input type='hidden' class='form-control' name='num' value='2'> -->
                                <input type='hidden' class='form-control' name='link_video2' value=''>
                                <?php 
                                     $round2s = $roundObj->getRoundByLevelAnswer(base64_decode($_REQUEST['level']),2,4);
                                     foreach($round2s AS $round2){
                                        //$project2 = $projectObj->getProjectById($round2['project_id']);
                                        //echo $project2['student_id'];
                                        $stus2 = $studentObj->getStuById($round2['student_id']);
                                        $teachers2 = $teacherObj->getTeacherById($round2['teacher_id']);
                                        $i2++;
                                        $j2=0;
                                        $k2=0;
                                        $st2="";
                                        $tea2="";

                                        $ck2 = $roundObj->checkRound($round2['id'],3,4,base64_decode($_REQUEST['level']));
                                        if($ck2){
                                            $checkbox2 ="checked";
                                        }else{
                                            $checkbox2 ="";
                                        }
                                        if($round2['link_video']==""){
                                            $show_link2="";
                                        }else{
                                            $show_link2="<a href='{$round2['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>";
                                        }
                                        foreach($stus2 AS $stu2){
                                            $j2++;
                                            $st2 .=$j2.". ".$stu2['stitle'].$stu2['sname']." ".$stu2['ssurname']."<br>";
                                        }
                                        foreach($teachers2 AS $teacher2){
                                            $k2++;
                                            $tea2 .=$k2.". ".$teacher2['ttitle'].$teacher2['tname']." ".$teacher2['tsurname']."<br>";
                                        }
                                        echo "
                                        <tr>
                                        <td width=''>{$i2}.</td>
                                        <td width=''>{$round2['school']}</td>
                                        <td width=''>{$st2}</td>
                                        <td width=''>{$tea2}</td>
                                        <td width=''>{$round2['tel']}</td>
                                        <td width=''></td>
                                        
                                        
                                    </tr>
                                         ";
                                     }
                                ?>
                            </tbody>
                        </table>
                        <!-- <div class="d-flex flex-row-reverse bd-highlight mt-3">
                            <button type="submit" class="btn btn-primary" name="round2">บันทึก</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <!-- Round Onsite -->
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;รายชื่อผู้ผ่านเข้ารอบตัดสิน&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัครการแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ ( <?php echo $level_name;?> )</div>
                    <form action="save1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th width=''>โรงเรียน</th>
                                    <th width='20%'>นักเรียน</th>
                                    <th width='20%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='10%'>เบอร์ติดต่อ</th>
                                    <th width='10%'>Onsite</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id2' value='<?php echo $_SESSION['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id2' value='<?php echo base64_decode($_REQUEST['level']);?>'>
                                <!-- <input type='hidden' class='form-control' name='num' value='2'> -->
                                <input type='hidden' class='form-control' name='link_video2' value=''>
                                <?php 
                                     $round3s = $roundObj->getRoundByLevelAnswer(base64_decode($_REQUEST['level']),3,4);
                                     foreach($round3s AS $round3){
                                        //$project2 = $projectObj->getProjectById($round3['project_id']);
                                        //echo $project2['student_id'];
                                        $stus3 = $studentObj->getStuById($round3['student_id']);
                                        $teachers3 = $teacherObj->getTeacherById($round3['teacher_id']);
                                        $i3++;
                                        $j3=0;
                                        $k3=0;
                                        $st3="";
                                        $tea3="";

                                        
                                        if($round3['link_video']==""){
                                            $show_link3="";
                                        }else{
                                            $show_link3="<a href='{$round3['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>";
                                        }
                                        foreach($stus3 AS $stu3){
                                            $j3++;
                                            $st3 .=$j3.". ".$stu3['stitle'].$stu3['sname']." ".$stu3['ssurname']."<br>";
                                        }
                                        foreach($teachers3 AS $teacher3){
                                            $k3++;
                                            $tea3 .=$k3.". ".$teacher3['ttitle'].$teacher3['tname']." ".$teacher3['tsurname']."<br>";
                                        }
                                        echo "
                                        <tr>
                                        <td width=''>{$i3}.</td>
                                        <td width=''>{$round3['school']}</td>
                                        <td width=''>{$st3}</td>
                                        <td width=''>{$tea3}</td>
                                        <td width=''>{$round3['tel']}</td>
                                        <td width='' align='center'>
                                            <button type='button' class='btn btn-success text-white'>Success</button>
                                        </td>
                                        
                                    </tr>
                                         ";
                                     }
                                ?>
                            </tbody>
                        </table>
                        <!-- <div class="d-flex flex-row-reverse bd-highlight mt-3">
                            <button type="submit" class="btn btn-primary" name="round3">บันทึก</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</head>