<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Level;
 $levelObj = new Level;
 
 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Activity;
$activityObj = new Activity; 
$activitys = $activityObj->getActivityById('6');
$activity_name = $activitys['name'];
use App\Model\Sciday\Micro;
 $microObj = new Micro;  
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
    <title>Sciday 2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="font-prompt fs-18">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <div class="container mt-3">
        <?php 
            $projects = $microObj->getMicroById(base64_decode($_REQUEST['micro_id']));
            // $levels = $levelObj->getLevelById($projects['level_id']);   
            // $level_name = $levels['name'];
        ?>
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name ;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $projects['level'];?></div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th width='8%'>#</th>
                                <th >ชื่อโครงงาน</th>
                                <th width='20%'>โรงเรียน</th>
                                <th width='20%'>นักเรียน</th>
                                <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                <th width='10%'>เอกสาร</th>
                                <th width='5%'>รูป</th>
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
                                        <td><?php echo $projects['micro_name']; ?></td>
                                        <td width='20%'><?php echo $projects['school']; ?></td>
                                        <td width='20%'>
                                            <?php 
                                                foreach($stus AS $stu){
                                                    $j++;
                                                    echo $j.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname']." ".$stu['sclass']."<br>";
                                                }
                                            ?>
                                        </td>
                                        <td width='20%'>
                                            <?php 
                                                foreach($teachers AS $teacher){
                                                    $k++;
                                                    echo $k.". ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname']."<br>";
                                                }
                                            ?>
                                        </td>
                                        <td width='10%'><a href='/science/upload/sciday/file/<?php echo $projects['file_register']; ?>' target='_blank'>Download</a></td>
                                        <td width='5%'><a href='/science/sciday/micro/pic.php?activity=<?php echo $activity_name; ?>&p_id=<?php echo $projects['id']; ?>&image_id=<?php echo $projects['images_id']; ?>' target='_blank' ><i class='bx bxs-image fs-24' ></i></a></td>
                                    </tr>
                                
                                <?php
                                
                            ?>
                        </tbody>
                    </table>
                    <?php 
                        use App\Model\Sciday\Success;
                        $successObj = new Success;
                        $show = $showroundObj->ShowByActivity(6,1);
                        if($show['edit_data']=='yes'){
                            ?>
                        <div class="d-flex flex-row-reverse bd-highlight mt-3">
                            <a href="/science/sciday/micro/del.php?id=<?php echo $projects['id']; ?>&stu_id=<?php echo $projects['student_id']; ?>&tea_id=<?php echo $projects['teacher_id']; ?>" class='btn btn-danger text-white'>ลบข้อมูล</a>&nbsp;
                            <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#edit'>
                                <i class='bx bx-edit' ></i> แก้ไขข้อมูล
                            </button>&nbsp;
                            <a href="/science/sciday/success.php?project_id=<?php echo $projects['id']; ?>&activity_id=6&user_id=<?php echo $_SESSION['user_id']; ?>" class='btn btn-success text-white'>ยืนยันข้อมูลถูกต้อง</a>&nbsp;
                            <?php
                                $datac['project_id']=$projects['id'];
                                $datac['activity_id']=6;
                                if($successObj->CheckSuccess($datac)){
                                    ?>
                                    <a href="" class='btn btn-danger text-white'>ยืนยันแล้ว</a>&nbsp;
                                    <?php
                                }
                            ?>
                        </div>
                        <?php
                        }
                    ?>
                   
                </div>
            </div>
        </div>
        <!-- Round 2 -->
        <?php 
            $show = $showroundObj->ShowByActivity(6,2);
            if($show['showround']=='yes'){
                // echo base64_decode($_REQUEST['micro_id']);
                $project2s = $microObj->getMicroById(base64_decode($_REQUEST['micro_id']));
                $round2 = $roundObj->checkRound(base64_decode($_REQUEST['micro_id']),2,6,$project2s['level_id']);
                if($round2){
                    
                    // print_r($project2s);
                    $round2s = $roundObj->getRound($project2s['id'],2,6,$project2s['level_id']);
                    // echo "<br>";
                    // echo "<br>";
                    // print_r($round2s);
                ?>
                    <div class="d-flex justify-content-between">
                        <span class="badge rounded-pill bg-success mt-3 shadow">
                            <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 2&nbsp;&nbsp;&nbsp;</b></h3>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $project2s['level'];?></div>
                                <table class="table table-striped table-hover mt-2 fs-18">
                                    <thead>
                                        <tr>
                                            <th width='5%'>#</th>
                                            <th>ชื่อโครงงานวิทยาศาสตร์</th>
                                            <th width='20%'>โรงเรียน</th>
                                            <th width='20%'>นักเรียน</th>
                                            <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                            <th width='10%'>วีดีโอ</th>
                                            <th width='10%'>File</th>
                                            <!-- <th>รูป</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="fs-14">
                                        <input type='hidden' class='form-control' name='link_video' value='<?php echo $round2s["link_video"];?>'>
                                        <?php 
                                            $stus2 = $studentObj->getStuById($project2s['student_id']);
                                            $teachers2 = $teacherObj->getTeacherById($project2s['teacher_id']);
                                            $i2++;
                                            $j2=0;
                                            $k2=0;
                                            $st2="";
                                            $tea2="";

                                            $ck2 = $roundObj->checkRound($project2s['id'],2,6,$project2s['level_id']);
                                            
                                            if($round2s['link_video']==""){
                                                $show_link2="
                                                    <button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                        <i class='bx bxs-video-plus'></i> อัพลิงค์วีดีโอ
                                                    </button>
                                                ";
                                            }else{                    
                                                $show = $showroundObj->ShowByActivity(6,1);
                                                if($show['edit_video']=='yes'){
                                                    $show_link2="
                                                        <a href='{$round2s['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Video</a>
                                                        <button type='button' class='btn btn-sm btn-warning text-white' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                            <i class='bx bxs-video-plus'></i> แก้ไข
                                                        </button>
                                                        
                                                    ";
                                                }else{
                                                    $show_link2="
                                                        <a href='{$round2s['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Video</a>
                                                    ";
                                                   
                                                }
                                            }
                                            if($round2s['file_program']==""){
                                                $show_file2="
                                                    <button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal2'>
                                                        <i class='bx bx-file'></i> อัพลิงค์ไฟล์ Hex
                                                    </button>
                                                ";
                                            }else{
                                                $show = $showroundObj->ShowByActivity(6,1);
                                                if($show['edit_video']=='yes'){
                                                    $show_file2="
                                                        <a href='{$round2s['file_program']}' class='btn btn-primary btn-sm text-white' target='_blank'><i class='bx bx-file'></i> File</a>
                                                        <button type='button' class='btn btn-sm btn-warning text-white' data-bs-toggle='modal' data-bs-target='#exampleModal2'>
                                                            <i class='bx bx-file'></i> แก้ไข
                                                        </button>
                                                    ";
                                                }else{
                                                    $show_file2="
                                                        <a href='{$round2s['file_program']}' class='btn btn-primary btn-sm text-white' target='_blank'><i class='bx bx-file'></i> File</a>
                                                    ";
                                                }

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
                                                    <td width='8%'>{$i2}.</td>
                                                    <td>{$project2s['micro_name']}</td>
                                                    <td width='20%'>{$project2s['school']}</td>
                                                    <td width='20%'>{$st2}</td>
                                                    <td width='15%'>{$tea2}</td>
                                                    <td width='10%'>{$show_link2}</td>
                                                    <td width='10%'>{$show_file2}</td>
                                                </tr>
                                            ";
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <div class="alert alert-success" role="alert">
                                <h5>การแข่งขันรอบสุดท้าย Micro:bit งานวันวิทยาศาสตร์ สจล 2565</h5>
                                <p>
                                Meeting ID: 396 127 0504 <br>
                                Passcode: 522595<br>
                                Join Zoom Meeting: 
                                <a href="https://us06web.zoom.us/j/3961270504?pwd=a1FKemdQb1R4MFJpSjdSVCt6N1JMQT09">Link</a>

                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
        <!-- Round 3 -->
        <?php 
            $show = $showroundObj->ShowByActivity(6,3);
            if($show['showround']=='yes'){
                $project3s = $microObj->getMicroById(base64_decode($_REQUEST['micro_id']));
                $round3s = $roundObj->checkRound(base64_decode($_REQUEST['micro_id']),6,1,$project3s['level_id']);
                if($round3s){
                    
                    // print_r($project3s);
                    $round3s = $roundObj->getRound($project3s['id'],3,1,$project3s['level_id']);
                    // echo "<br>";
                    // echo "<br>";
                    // print_r($round3s);
                ?>
                    <div class="d-flex justify-content-between">
                        <span class="badge rounded-pill bg-success mt-3 shadow">
                            <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ Onsite&nbsp;&nbsp;&nbsp;</b></h3>
                        </span>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $project3s['level'];?></div>
                                <table class="table table-striped table-hover mt-2 fs-18">
                                    <thead>
                                        <tr>
                                            <th width='8%'>#</th>
                                            <th >ชื่อโครงงานวิทยาศาสตร์</th>
                                            <th width='20%'>โรงเรียน</th>
                                            <th width='20%'>นักเรียน</th>
                                            <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                            <th width='15%'>Onsite</th>
                                            <!-- <th>รูป</th> -->
                                        </tr>
                                    </thead>
                                    <tbody class="fs-14">
                                        <input type='hidden' class='form-control' name='link_video' value='<?php echo $round3s["link_video"];?>'>
                                        <?php 
                                            $stus3 = $studentObj->getStuById($project3s['student_id']);
                                            $teachers3 = $teacherObj->getTeacherById($project3s['teacher_id']);
                                            $i3++;
                                            $j3=0;
                                            $k3=0;
                                            $st3="";
                                            $tea3="";

                                            $ck3 = $roundObj->checkRound3ById($project3s['id']);
                                            
                                            if($round3s['link_video']==""){
                                                $show_link3="
                                                    <button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                        <i class='bx bxs-video-plus'></i> อัพลิงค์วีดีโอ
                                                    </button>
                                                ";
                                            }else{
                                                $show_link3="<a href='{$round3s['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>";
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
                                                    <td width='8%'>{$i3}.</td>
                                                    <td>{$project3s['micro_name']}</td>
                                                    <td width='20%'>{$project3s['school']}</td>
                                                    <td width='20%'>{$st3}</td>
                                                    <td width='15%'>{$tea3}</td>
                                                    <td width='10%'><button type='button' class='btn btn-success text-white'>Success</button></td>
                                                </tr>
                                            ";
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
    <!-- Modal Up Link Video -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="video.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">อัพลิงค์วีดีโอ Youtube</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $project2s['id'];?>" name="project_id">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $project2s['level_id'];?>" name="level_id">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="" value="6" name="activity_id">
                    
                    <!-- <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Link Video Yuotube" value="<?php echo $project2s['id'];?>" name="project_id"> -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">เพิ่มข้อมูลวีดีโอ</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ใส่ลิงค์ Video Youtube ที่นี้..." name="link_video">
                         
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Up Link file -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="file.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">อัพลิงค์ file Hex</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $project2s['id'];?>" name="project_id">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $project2s['level_id'];?>" name="level_id">
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="" value="6" name="activity_id">
                    
                    <!-- <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="Link Video Yuotube" value="<?php echo $project2s['id'];?>" name="project_id"> -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">เพิ่ม link file Hex</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ใส่ลิงค์ file Hex ที่นี้..." name="file_program">
                         
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class=" modal fade " id="edit" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5> -->
                        <div class="d-flex justify-content-between">
                            <span class="badge rounded-pill bg-warning">
                                <h2><b>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูล&nbsp;&nbsp;&nbsp;</b></h2>
                            </span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">1. ชื่อโครงงาน micro:bitน <font color="red">*</font> </b></label>
                                        <input type="text" class="form-control w-75" name="micro_name"  value="<?php echo $projects['micro_name'];?>">
                                        <input class="form-control" type="hidden"  name="micro_id" value="<?php echo $projects['id'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">2. ชื่อสถานศึกษา/โรงเรียน <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'<font color="red"> ห้ามใช้ ร.ร.</font></b></label>
                                        <input type="text" class="form-control w-75" name="school"  value="<?php echo $projects['school'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">3. ประเภทแข่งขัน micro:bit ประจำปี 2565<font color="red">*</font></b></label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <?php 
                                            $levels =$levelObj->getLevelByActivity('6');
                                            foreach($levels AS $level){
                                                echo "
                                                    <div class='form-check form-check-inline'>
                                                        <input class='form-check-input' type='radio' name='level_id' id='inlineRadio{$levle['id']}' value='{$level['id']}' checked>
                                                        <label class='form-check-label' for='inlineRadio{$levle['id']}'>{$level['name']}</label>
                                                    </div>
                                                ";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">4. รายชื่อผู้เข้าแข่งขัน<font color="red">*</font> <font color="red">(ไม่เกิน 3 คน)</font></b></label>
                                        <input class="form-control" type="hidden"  name="student_id" value="<?php echo $projects['student_id'];?>">
                                        <ol>
                                            <?php
                                                foreach($stus AS $stu){
                                                    ?>
                                                        <li>
                                                            <div class="d-flex mb-2">
                                                                <div class="">
                                                                        <select class="form-select" aria-label="Default select example" name="stitle[]">
                                                                            <option selected>คำนำหน้าชื่อ</option>
                                                                            <?php 
                                                                                $titles = $titleObj->getAllTitle();
                                                                                foreach($titles AS $title){
                                                                                $selected =($title['id']==$stu['stitle_id']) ?
                                                                                "selected" : "";
                                                                                    
                                                                                    echo "
                                                                                        <option value='{$title['id']}' {$selected}>{$title['name']}</option>
                                                                                    ";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]" value="<?php echo $stu['sname'];?>">
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="ssurname[]" value="<?php echo $stu['ssurname'];?>">
                                                                </div>
                                                                <div class="">
                                                                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="id" name="sid[]" value="<?php echo $stu['sid'];?>">
                                                                </div>
                                                                <div class="">
                                                                    <select class="form-select" aria-label="Default select example" name="sclass[]">

                                                                        <option selected><?php echo $stu['sclass'];?></option>
                                                                        <option value='ม.1'>ม.1</option>
                                                                        <option value='ม.2'>ม.2</option>
                                                                        <option value='ม.3'>ม.3</option>
                                                                        <option value='ม.4'>ม.4</option>
                                                                        <option value='ม.5'>ม.5</option>
                                                                        <option value='ม.6'>ม.6</option>
                                                                    </select>
                                                                </div>
                                                                <!-- <button class="btn btn-success mx-2 btn-add text-white">+</button>
                                                                <button class="btn btn-danger btn-remove text-white">-</button> -->
                                                            </div>
                                                        </li>
                                                    <?php 
                                                }
                                            ?>
                                                                                        
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">5. รายชื่ออาจารย์ที่ปรึกษา (ไม่เกิน 2 คน)  <font color="red">*</font></b></label>
                                        <input class="form-control" type="hidden"  name="teacher_id" value="<?php echo $projects['teacher_id'];?>">
                                        <ol>
                                            <?php 
                                                foreach($teachers AS $teacher){
                                                    ?>
                                                        <li>
                                                            <div class="d-flex mb-2">
                                                                <div class="">
                                                                    <select class="form-select" aria-label="Default select example" name="ttitle[]">
                                                                        <option selected>คำนำหน้าชื่อ</option>
                                                                        <?php 
                                                                            $gtitles = $titleObj->getTitleByGroup(2);
                                                                            foreach($gtitles AS $title){
                                                                                $selected =($title['id']==$teacher['ttitle_id']) ?
                                                                                "selected" : "";
                                                                                echo "
                                                                                    <option value='{$title['id']}' {$selected}>{$title['name']}</option>
                                                                                ";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]" value="<?php echo $teacher['tname'];?>">
                                                                </div>
                                                                <div class="">
                                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="tsurname[]" value="<?php echo $teacher['tsurname'];?>">
                                                                </div>
                                                                <div class="">
                                                                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="id" name="tid[]" value="<?php echo $teacher['tid'];?>">
                                                                </div>
                                                                <!-- <button class="btn btn-success mx-2 btn-add text-white">+</button>
                                                                <button class="btn btn-danger btn-remove text-white">-</button> -->
                                                            </div>
                                                        </li>
                                                    <?php
                                                }
                                            ?>            
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">6. Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4 เป็นไฟล์ PDF เท่านั้น <font color="red">*</font></b></label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file_doc" >
                                            <input class="form-control" type="hidden" id="formFileMultiple" name="file_register" value="<?php echo $projects['file_register'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">7. Upload ไฟล์รูปภาพ (ถ้ามี) <font color="red">( *.png หรือ *.jpg )</font> เท่านั้น</b></label>
                                            <input class="form-control" type="hidden"  name="images_id" value="<?php echo $projects['images_id'];?>">
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="dropzone" id="drop"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <hr class="text-warning">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/drop.js"></script>
    <script>
        function readURL(input) {
            if (input.files[1]) {
                let reader = new FileReader();
                document.querySelector('#imgControl').classList.replace("d-none", "d-block");
                reader.onload = function(e) {
                    let element = document.querySelector('#imgUpload');
                    element.setAttribute("src", e.target.result);
                }
                reader.readAsDataURL(input.files[1]);
            
            }
        }
    </script>
</body>

</html>