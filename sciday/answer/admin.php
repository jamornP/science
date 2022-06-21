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
$activitys = $activityObj->getActivityById($_SESSION['activity']);
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
    </div>
</body>
</head>