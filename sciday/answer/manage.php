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
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name ;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัครการแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ ( <?php echo $level_name;?> )</div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th width=''>โรงเรียน</th>
                                    <th width='20%'>นักเรียน</th>
                                    <th width='20%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='10%'>เบอร์ติดต่อ</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_SESSION['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo base64_decode($_REQUEST['level']);?>'>
                                <!-- <input type='hidden' class='form-control' name='num' value='2'> -->
                                <input type='hidden' class='form-control' name='link_video' value=''>
                                <?php 
                                     
                                     $answers = $answerObj->getAnswerByLevel(base64_decode($_REQUEST['level']));
                                    $i=0;
                                    
                                    foreach($answers AS $answer){
                                        $stus = $studentObj->getStuById($answer['student_id']);
                                        $teachers = $teacherObj->getTeacherById($answer['teacher_id']);
                                        $i++;
                                        $j=0;
                                        $k=0;
                                        $st="";
                                    $tea="";
                                        $ck = $roundObj->checkRound2ById($answer['id']);
                                        if($ck){
                                            $checkbox ="checked";
                                        }else{
                                            $checkbox ="";
                                        }
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
                                                <td width=''>{$i}.</td>
                                                <td width=''>{$answer['school']}</td>
                                                <td width=''>{$st}</td>
                                                <td width=''>{$tea}</td>
                                                <td width='' align='center'>
                                                    <div class='form-check'>
                                                        <input class='form-check-input' type='checkbox' value='{$answer['id']}' id='flexCheckDefault' name='p_id[]' {$checkbox}>
                                                    </div>
                                                    
                                                </td>
                                                
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php// if($_SESSION['round']==1){?>
                        <div class="d-flex flex-row-reverse bd-highlight mt-3">
                            <button type="submit" class="btn btn-primary" name="round1">บันทึก</button>
                        </div>
                        <?php// }?>
                    </form>
                </div>
            </div>
        </div>