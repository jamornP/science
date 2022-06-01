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
        <?php 
            $projects = $projectObj->getProjectById($_REQUEST['project_id']);

        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $projects['level'];?></div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อโครงงานวิทยาศาสตร์</th>
                                <th>โรงเรียน</th>
                                <th>นักเรียน</th>
                                <th>อาจารย์ที่ปรึกษา</th>
                                <th>เอกสาร</th>
                                <th>รูป</th>
                            </tr>
                        </thead>
                        <tbody class="fs-14">
                            <?php 
                                $stus = $studentObj->getStuById($projects['student_id']);
                                $teachers = $teacherObj->getTeacherById($projects['teacher_id']);
                                $i++;
                                $j=0;
                                $k=0;
                                ?>
                                    <tr>
                                        <td width='8%'><?php echo $i; ?>.</td>
                                        <td><?php echo $projects['project_name']; ?></td>
                                        <td width='20%'><?php echo $projects['school']; ?></td>
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
                                        <td width='10%'><a href='/science/upload/sciday/file/<?php echo $projects['file_register']; ?>' target='_blank'>Download</a></td>
                                        <td width='5%'><a href='/science/sciday/project/pic.php?activity=<?php echo $activity_name; ?>&p_id=<?php echo $projects['id']; ?>&image_id=<?php echo $proname['images_id']; ?>' target='_blank' ><i class='bx bxs-image fs-24' ></i></a></td>
                                    </tr>
                                
                                <?php
                                
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
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level_name;?></div>
                    <form action="saver1.php" method="post">
                        <table class="table table-striped table-hover mt-2 fs-18">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อโครงงานวิทยาศาสตร์</th>
                                    <th>โรงเรียน</th>
                                    <th>นักเรียน</th>
                                    <th>อาจารย์ที่ปรึกษา</th>
                                    <th>วีดีโอ</th>
                                    <!-- <th>รูป</th> -->
                                </tr>
                            </thead>
                            <tbody class="fs-14">
                                <input type='hidden' class='form-control' name='activity_id' value='<?php echo $_REQUEST['activity'];?>'>
                                <input type='hidden' class='form-control' name='level_id' value='<?php echo $_REQUEST['level'];?>'>
                                <input type='hidden' class='form-control' name='num' value='2'>
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
                                                <td width='20%'>{$st}</td>
                                                <td width='15%'>{$tea}</td>
                                                <td width='10%'>{$show_link}</td>
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