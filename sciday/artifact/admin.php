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
    $activitys = $activityObj->getActivityById(1);
    $activity_name = $activitys['name'];
use App\Model\Sciday\Artifact;
 $artifactObj = new Artifact;  
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
                <h2><b>&nbsp;&nbsp;&nbsp;การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="text-end p-2">
                        <a href="/science/sciday/export/artifact.php?level_id=<?php echo base64_decode($_REQUEST['level']);?>" class="text-end btn btn-success text-white"><i class='bx bx-file' ></i> Excel</a>
                    </div>
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัคร <?php echo $level_name;?></div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th width='5%'>#</th>
                                <th >ชื่อสิ่งประดิษฐ์</th>
                                <th width='20%'>โรงเรียน</th>
                                <th width='13%'>นักเรียน</th>
                                <th width='13%'>อาจารย์ที่ปรึกษา</th>
                                <th width='8%'>ติดต่อ</th>
                                <th width='10%'>เอกสาร</th>
                                <th width='5%'>รูป</th>
                            </tr>
                        </thead>
                        <tbody class="fs-14">
                            <?php 
                                $pronames = $artifactObj->getArtifactByLevel(base64_decode($_REQUEST['level']));
                                $i=0;
                                
                                foreach($pronames AS $proname){
                                    $stus = $studentObj->getStuById($proname['student_id']);
                                    $teachers = $teacherObj->getTeacherById($proname['teacher_id']);
                                    $i++;
                                    $j=0;
                                    $k=0;
                                    ?>
                                   
                                        <tr>
                                            <td ><?php echo $i; ?>.</td>
                                            <td><?php echo $proname['artifact_name']; ?></td>
                                            <td ><?php echo $proname['school']; ?></td>
                                            <td >
                                                <?php 
                                                    foreach($stus AS $stu){
                                                        $j++;
                                                        echo $j.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname']."<br>";
                                                    }
                                                ?>
                                            </td>
                                            <td >
                                                <?php 
                                                    foreach($teachers AS $teacher){
                                                        $k++;
                                                        echo $k.". ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname']."<br>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $proname['tel']; ?></td>
                                            <td ><a href='/science/upload/sciday/file/<?php echo $proname['file_register']; ?>' target='_blank'>Download</a></td>
                                            <td ><a href='/science/sciday/artifact/pic.php?activity=<?php echo $activity_name; ?>&p_id=<?php echo $proname['id']; ?>' target='_blank' ><i class='bx bxs-image fs-24' ></i></a></td>
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
            <span class="badge rounded-pill bg-success mt-3 shadow">
                <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 2&nbsp;&nbsp;&nbsp;</b></h3>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level_name;?></div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th>ชื่อสิ่งประดิษฐ์</th>
                                    <th width='20%'>โรงเรียน</th>
                                    <th width='20%'>นักเรียน</th>
                                    <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='15%'>วีดีโอ</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_SESSION['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo base64_decode($_REQUEST['level']);?>'>
                                <input type='hidden' class='form-control' name='num' value='2'>
                                <input type='hidden' class='form-control' name='link_video' value=''>
                                <?php 
                                    $rounds = $roundObj->getRoundByLevelArtifact(base64_decode($_REQUEST['level']),2,1);
                                    $i=0;
                                    
                                    foreach($rounds AS $round){
                                        $stus = $studentObj->getStuById($round['student_id']);
                                        $teachers = $teacherObj->getTeacherById($round['teacher_id']);
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
                                        // ค้นหานักเรียน
                                        foreach($stus AS $stu){
                                            $j++;
                                            $st .=$j.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname']."<br>";
                                        }
                                        // ค้นหาชื่ออาจารย์ที่ปรึกษา
                                        foreach($teachers AS $teacher){
                                            $k++;
                                            $tea .=$k.". ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname']."<br>";
                                        }
                                        echo "
                                            <tr>
                                                <td >{$i}.</td>
                                                <td>{$round['artifact_name']}</td>
                                                <td >{$round['school']}</td>
                                                <td >{$st}</td>
                                                <td >{$tea}</td>
                                                <td >{$show_link}</td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
         <!-- Round 3 -->
         <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-success mt-3 shadow">
                <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ Onsite&nbsp;&nbsp;&nbsp;</b></h3>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level_name;?></div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th>ชื่อสิ่งประดิษฐ์</th>
                                    <th width='20%'>โรงเรียน</th>
                                    <th width='20%'>นักเรียน</th>
                                    <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='15%'>Onsite</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_SESSION['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo base64_decode($_REQUEST['level']);?>'>
                                <input type='hidden' class='form-control' name='num' value='2'>
                                <input type='hidden' class='form-control' name='link_video' value=''>
                                <?php 
                                    $rounds = $roundObj->getRoundByLevelArtifact(base64_decode($_REQUEST['level']),3,1);
                                    $i=0;
                                    
                                    foreach($rounds AS $round){
                                        $stus = $studentObj->getStuById($round['student_id']);
                                        $teachers = $teacherObj->getTeacherById($round['teacher_id']);
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
                                        // ค้นหานักเรียน
                                        foreach($stus AS $stu){
                                            $j++;
                                            $st .=$j.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname']."<br>";
                                        }
                                        // ค้นหาชื่ออาจารย์ที่ปรึกษา
                                        foreach($teachers AS $teacher){
                                            $k++;
                                            $tea .=$k.". ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname']."<br>";
                                        }
                                        echo "
                                            <tr>
                                                <td> {$i}.</td>
                                                <td>{$round['artifact_name']}</td>
                                                <td >{$round['school']}</td>
                                                <td >{$st}</td>
                                                <td >{$tea}</td>
                                                <td >
                                                    <button type='button' class='btn btn-success text-white'>Success</button>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>