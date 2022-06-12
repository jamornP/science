<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 


 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Activity;
    $activityObj = new Activity; 
    $activitys = $activityObj->getActivityById('3');
    $activity_name = $activitys['name'];
use App\Model\Sciday\Iot;
 $iotObj = new Iot;  
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
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="font-prompt fs-18">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name ;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <?php 
            $projects = $iotObj->getIotById(base64_decode($_REQUEST['project_id']));
            
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; ข้อมูล</div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th width='8%'>#</th>
                                <th >ชื่อโครงงาน IoT</th>
                                <th width='20%'>โรงเรียน</th>
                                <th width='20%'>นักเรียน</th>
                                <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                <th width='10%'>เอกสาร</th>
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
                                        <td><?php echo $projects['iot_name']; ?></td>
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
                                        
                                    </tr>
                                
                                <?php
                                
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex flex-row-reverse bd-highlight mt-3">
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#edit'>
                        <i class='bx bx-edit' ></i> แก้ไขข้อมูล
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
        <?php

        ?>
        <!-- Round 2 -->
        <?php 
            $round2s = $roundObj->checkRound2ById(base64_decode($_REQUEST['project_id']));
            if(0){
                $project2s = $projectObj->getProjectById(base64_decode($_REQUEST['project_id']));
                // print_r($project2s);
                $round2s = $roundObj->getRound2ById($project2s['id']);
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
                            <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $round2s['name'];?></div>
                            <table class="table table-striped table-hover mt-2 fs-18">
                                <thead>
                                    <tr>
                                        <th width='8%'>#</th>
                                        <th >ชื่อโครงงานวิทยาศาสตร์</th>
                                        <th width='20%'>โรงเรียน</th>
                                        <th width='20%'>นักเรียน</th>
                                        <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                        <th width='15%'>วีดีโอ</th>
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

                                        $ck2 = $roundObj->checkRound2ById($project2s['id']);
                                        
                                        if($round2s['link_video']==""){
                                            $show_link2="
                                                <button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                    <i class='bx bxs-video-plus'></i> อัพลิงค์วีดีโอ
                                                </button>
                                            ";
                                        }else{
                                            $show_link2="
                                                <a href='{$round2s['link_video']}' class='btn btn-danger btn-sm text-white' target='_blank'><i class='bx bxl-youtube'></i> Link</a>
                                                <button type='button' class='btn btn-sm btn-warning text-white' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                    <i class='bx bxs-video-plus'></i> แก้ไข
                                                </button>
                                            ";
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
                                                <td>{$project2s['project_name']}</td>
                                                <td width='20%'>{$project2s['school']}</td>
                                                <td width='20%'>{$st2}</td>
                                                <td width='15%'>{$tea2}</td>
                                                <td width='10%'>{$show_link2}</td>
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
        ?>
        <!-- Round 3 -->
        <?php 
            if(0){
                $round3s = $roundObj->checkRound3ById(base64_decode($_REQUEST['project_id']));
                if($round3s){
                    $project3s = $projectObj->getProjectById(($_REQUEST['project_id']));
                    // print_r($project3s);
                    $round3s = $roundObj->getRound3ById($project3s['id']);
                    // echo "<br>";
                    // echo "<br>";
                    // print_r($round3s);
                ?>
                    <div class="d-flex justify-content-between">
                        <span class="badge rounded-pill bg-success mt-3 shadow">
                            <h3><b>&nbsp;&nbsp;&nbsp;ทีมที่ผ่านเข้ารอบ 3&nbsp;&nbsp;&nbsp;</b></h3>
                        </span>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20 table-responsive">
                                <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo $round3s['name'];?></div>
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
                                                    <td>{$project3s['project_name']}</td>
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
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Link Video Yuotube" value="<?php echo $project2s['id'];?>" name="project_id">
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
                    <input type="hidden" class="form-control w-75" name="iot_id"  value="<?php echo $projects['id'];?>" required>
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="text-primary"><b class="fs-18">1. ชื่อโครงงาน <font color="red">*</font></b></label>
                                    <input type="text" class="form-control w-75" name="iot_name"  value="<?php echo $projects['iot_name'];?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="text-primary"><b class="fs-18">2. ชื่อสถานศึกษา/โรงเรียน <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'<font color="red"> ห้ามใช้ ร.ร.</font></b></label>
                                    <input type="text" class="form-control w-75" name="school" value="<?php echo $projects['school'];?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group mt-2">
                                    <label for="" class="text-primary"><b class="fs-18">รายชื่อผู้เข้าประกวดโครงงาน<font color="red">*</font> <font color="red">(ไม่เกิน 3 คน)</font></b></label>
                                    <input class="form-control" type="hidden" id="formFileMultiple" name="student_id" value="<?php echo $projects['student_id'];?>">
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
                                    <label for="" class="text-primary"><b class="fs-18">อาจารย์ที่ปรึกษาโครงงาน <font color="red">(ไม่เกิน 2 คน)</font></b></label>
                                    <input class="form-control" type="hidden" id="formFileMultiple" name="teacher_id" value="<?php echo $projects['teacher_id'];?>">
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
                                                                        foreach($titles AS $title){
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
                                            <label for="tel" class="form-label text-primary "><b class="fs-18">5. เบอร์โทรศัพท์ติดต่อ <font color="red">*</font></b></label>
                                            <input class="form-control" type="text" id="tel" name="tel" value="<?php echo $projects['tel'];?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group mt-2">
                                    <div class="mb-3 w-75">
                                        <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์ใบสมัคร <font color="red">*</font></b></label>
                                        <input class="form-control" type="file" id="formFileMultiple" name="file_doc" >
                                        <input class="form-control" type="hidden"  name="file_register" value="<?php echo $projects['file_register'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md">
                                <div class="form-group mt-2">
                                    <div class="mb-3 w-75">
                                        <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์รูปภาพ <font color="red">( *.png หรือ *.jpg )</font> เท่านั้น</b></label>
                                        <div class="container">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="dropzone" id="drop"></div>
                                                    <input class="form-control" type="hidden" id="formFileMultiple" name="images_id" value="<?php echo $projects['images_id'];?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <hr class="text-warning">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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