<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 $activitys = $activityObj->getActivityById($_REQUEST['activity']);
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
                <blockquote class="blockquote">
                    <h4 class="mt-3"><b>กำหนดการ</b></h4>
                </blockquote>
                <div class="mt-1">
                    <img src="/science/sciday/images/bg.png" class="img-fluid rounded" alt="...">
                </div>
                <figcaption class="blockquote-footer fs-18">
                <?php echo $_REQUEST['activity'];?>
                </figcaption>
            </figure>
        </div>
        
        <!-- <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">ทีมที่สมัคร</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">รอบที่ 2</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">รอบที่ 3</button>
            </li>
        </ul> -->
        <div class="tab-content  p-2 mb-5" id="myTabContent">
            <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> -->
                <div class="d-flex justify-content-between">
                <span class="badge rounded-pill bg-warning mt-3 shadow">
                    <h3><b>&nbsp;&nbsp;&nbsp;โรงเรียนที่สมัครแข่งขันแล้ว&nbsp;&nbsp;&nbsp;</b></h3>
                </span>
                </div>
                <?php
                
                
                    $levels = $levelObj->getLevelByActivity($_REQUEST['activity']);
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
            <?php if($_SESSION['round2']){?>
                <div class="d-flex justify-content-between">
                    <span class="badge rounded-pill bg-success mt-3 shadow">
                        <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 2&nbsp;&nbsp;&nbsp;</b></h3>
                    </span>
                </div>
                <?php 
                
                    $levels = $levelObj->getLevelByActivity($_REQUEST['activity']);
                    foreach($levels AS $level){
                        
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow-sm p-3 mb-2 bg-white rounded mt-3 fs-20">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $level['name'];?></div>
                                <table class="table table-striped table-hover fs-20">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>โรงเรียน</th>
                                            <th>ระดับ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                            $rounds = $roundObj->getRound2ByLevel($level['id']);
                                            $i=0;
                                            foreach($rounds AS $round){
                                                $i++;
                                                echo "
                                                    <tr>
                                                        <td width='10%'>{$i}</td>
                                                        <td width='60%'>{$round['school']}</td>
                                                        <td width='30%'>{$round['name']}</td>
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
        </div>
       
        
        
    </div>
</body>
</html>