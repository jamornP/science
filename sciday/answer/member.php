<?php 
    // echo "<pre>"; 
    // print_r($_REQUEST);
    // echo "</pre><br>";
?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Level;
 $levelObj = new Level;
 $levels = $levelObj->getLevelById($_REQUEST['level']);   
$level_name = $levels['name'];
 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Activity;
    $activityObj = new Activity; 
    $activitys = $activityObj->getActivityById('4');
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
    <link rel="stylesheet" href="css/style.css">

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
            $projects = $answerObj->getAnswerById(base64_decode($_REQUEST['answer_id']));
            
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; ตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ ( <?php echo $projects['level'];?> )</div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th width='8%'>#</th>
                                
                                <th width='20%'>โรงเรียน</th>
                                <th width='20%'>นักเรียน</th>
                                <th width='15%'>อาจารย์ที่ปรึกษา</th>
                                <th width='15%'>เบอร์ติดต่อ</th>
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
                                        <td><?php echo $projects['tel']; ?></td>
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
    </div>
    <!-- Modal Edit -->
    <div class=" modal fade " id="edit" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5> -->
                    <div class="d-flex justify-content-between">
                        <span class="badge rounded-pill bg-warning">
                            <h2><b>&nbsp;&nbsp;&nbsp;แก้ไขข้อมูล&nbsp;&nbsp;&nbsp;</b></h2>
                        </span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="edit.php" method="post" enctype="multipart/form-data" id="">
                    <div class="modal-body">
                        <input type="hidden" class="form-control w-75" name="answer_id" value="<?php echo $projects['id'];?>">
                        <div class="row mt-3">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="" class="text-primary"><b class="fs-18">1. ประเภทแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ ประจำปี 2565<font color="red">*</font></b></label>
                                </div>
                                <div class="form-group mt-2">
                                    <?php 
                                        $levels =$levelObj->getLevelByActivity('4');
                                        foreach($levels AS $level){
                                            $selected =($level['id']==$projects['level_id']) ?
                                            "checked" : "";
                                            echo "
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='level_id' id='inlineRadio{$levle['id']}' value='{$level['id']}' {$selected}>
                                                    <label class='form-check-label' for='inlineRadio{$levle['id']}'>{$level['name']}</label>
                                                </div>
                                            ";
                                        }
                                    ?>
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
                                    <label for="" class="text-primary"><b class="fs-18">3. รายชื่อผู้เข้าแข่งขัน<font color="red">*</font> <font color="red">(ไม่เกิน 2 คน)</font></b></label>
                                    <input class="form-control" type="hidden" id="tel" name="student_id" value="<?php echo $projects['student_id'];?>">
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
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="id" name="sid[]" value="<?php echo $stu['sid'];?>">
                                                            </div>
                                                            
                                                           
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
                                    <label for="" class="text-primary"><b class="fs-18">4. อาจารย์ผู้ประสานงาน <font color="red">*</font></b></label>
                                    <input class="form-control" type="hidden" id="tel" name="teacher_id" value="<?php echo $projects['teacher_id'];?>">
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
                                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="id" name="tid[]" value="<?php echo $teacher['tid'];?>">
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
                                        <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">6. Upload ไฟล์ใบสมัคร <font color="red">*</font></b></label>
                                        <input class="form-control" type="file" id="formFileMultiple" name="file_doc">
                                        <input class="form-control" type="hidden" id="" name="file_register" value="<?php echo $projects['file_register'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</body>
</head>
