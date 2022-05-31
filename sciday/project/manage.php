<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Level;
 $levelObj = new Level;
 $levels = $levelObj->getLevelById($_REQUEST['level']);   
$level_name = $levels['name'];
 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Activity;
    $activityObj = new Activity; 
    $activitys = $activityObj->getActivityById($_REQUEST['activity']);
    $activity_name = $activitys['name'];
use App\Model\Sciday\Project;
 $projectObj = new Project;  
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
    <title>Admin Sciday</title>
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
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัคร <?php echo $level_name;?></div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                <th width='8%'>#</th>
                                    <th width=''>ชื่อโครงงานวิทยาศาสตร์</th>
                                    <th width='20%'>โรงเรียน</th>
                                    <th width='18%'>นักเรียน</th>
                                    <th width='18%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='10%'>ผ่านเข้ารอบ 2</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_REQUEST['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo $_REQUEST['level'];?>'>
                                <!-- <input type='hidden' class='form-control' name='num' value='2'> -->
                                <input type='hidden' class='form-control' name='link_video' value=''>
                                <?php 
                                     
                                    $pronames = $projectObj->getProjectByLevel($_REQUEST['level']);
                                    $i=0;
                                    $st="";
                                    $tea="";
                                    foreach($pronames AS $proname){
                                        $stus = $studentObj->getStuById($proname['student_id']);
                                        $teachers = $teacherObj->getTeacherById($proname['teacher_id']);
                                        $i++;
                                        $j=0;
                                        $k=0;
                                        $ck = $roundObj->getRound2ById($proname['id']);
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
                                                <td>{$proname['project_name']}</td>
                                                <td width=''>{$proname['school']}</td>
                                                <td width=''>{$st}</td>
                                                <td width=''>{$tea}</td>
                                                <td width='' align='center'>
                                                    <div class='form-check'>
                                                        <input class='form-check-input' type='checkbox' value='{$proname['id']}' id='flexCheckDefault' name='p_id[]' {$checkbox}>
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
        <!-- Round 2 -->
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 2&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level_name;?></div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th width=''>ชื่อโครงงานวิทยาศาสตร์</th>
                                    <th width='20%'>โรงเรียน</th>
                                    <th width='18%'>นักเรียน</th>
                                    <th width='18%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='10%'>ผ่านเข้ารอบ 3</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_REQUEST['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo $_REQUEST['level'];?>'>
                                <!-- <input type='hidden' class='form-control' name='num' value='2'> -->
                                <input type='hidden' class='form-control' name='link_video' value=''>
                                <?php 
                                     
                                    $rounds = $roundObj->getRound2ByLevel($_REQUEST['level']);
                                    $i=0;
                                    $st="";
                                    $tea="";
                                    foreach($rounds AS $round){
                                        $stus = $studentObj->getStuById($proname['student_id']);
                                        $teachers = $teacherObj->getTeacherById($proname['teacher_id']);
                                        $i++;
                                        $j=0;
                                        $k=0;
                                        $ck2 = $roundObj->getRound3ById($proname['id']);
                                        if($ck2){
                                            $checkbox2 ="checked";
                                        }else{
                                            $checkbox2 ="";
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
                                                <td width='8%'>{$i}.</td>
                                                <td>{$round['project_name']}</td>
                                                <td width='20%'>{$round['school']}</td>
                                                <td width='18%'>{$st}</td>
                                                <td width='18%'>{$tea}</td>
                                                <td width='10%' align='center'>
                                                    <div class='form-check'>
                                                        <input class='form-check-input' type='checkbox' value='{$round['id']}' id='flexCheckDefault' name='p_id[]' {$checkbox2}>
                                                    </div>
                                                    
                                                </td>
                                                
                                            </tr>
                                        ";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div class="d-flex flex-row-reverse bd-highlight mt-3">
                            <button type="submit" class="btn btn-primary" name="round2">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Round 3 -->
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบมานำเสนอ Onsite&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level_name;?></div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th width='8%'>#</th>
                                    <th width=''>ชื่อโครงงานวิทยาศาสตร์</th>
                                    <th width='20%'>โรงเรียน</th>
                                    <th width='18%'>นักเรียน</th>
                                    <th width='18%'>อาจารย์ที่ปรึกษา</th>
                                    <th width='10%'>มาแสดงที่คณะ</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_REQUEST['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo $_REQUEST['level'];?>'>
                                <!-- <input type='hidden' class='form-control' name='num' value='2'> -->
                                <input type='hidden' class='form-control' name='link_video' value=''>
                                <?php 
                                     
                                    $rounds = $roundObj->getRound3ByLevel($_REQUEST['level']);
                                    $i=0;
                                    $st="";
                                    $tea="";
                                    foreach($rounds AS $round){
                                        $stus = $studentObj->getStuById($proname['student_id']);
                                        $teachers = $teacherObj->getTeacherById($proname['teacher_id']);
                                        $i++;
                                        $j=0;
                                        $k=0;

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
                                                <td width='8%'>{$i}.</td>
                                                <td>{$round['project_name']}</td>
                                                <td width='20%'>{$round['school']}</td>
                                                <td width='18%'>{$st}</td>
                                                <td width='18%'>{$tea}</td>
                                                <td width='10%' align='center'>
                                                    <div class='form-check'>
                                                        <input class='form-check-input' type='checkbox' value='{$round['id']}' id='flexCheckDefault' name='p_id[]' >
                                                    </div>
                                                    
                                                </td>
                                                
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
    </div>
</body>

</html>