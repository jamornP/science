<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 use App\Model\Sciday\Certificate;
 $certificateObj = new Certificate; 
 use App\Model\Sciday\Success;
 $successObj = new Success; 
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
    
    
    
    <div class=" container-fluid mt-5">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php
                $activitys = $activityObj->getActivityByYear('2022');
                foreach($activitys AS $activity){
                    $activity_id=base64_encode($activity['id']);
                    echo "
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='{$activity['id']}'>
                                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse{$activity['id']}' aria-expanded='false' aria-controls='flush-collapse{$activity['id']}'>
                                {$activity['name']}
                                </button>
                            </h2>
                            <div id='flush-collapse{$activity['id']}' class='accordion-collapse collapse' aria-labelledby='flush-heading{$activity['id']}' data-bs-parent='#accordionFlushExample'>
                                <div class='accordion-body bg-l'>
                    ";
                                ?>
                                <?php
                                    switch($activity['id']){
                                        case 1:
                                           ?>
                                                <div class="card">
                                                    <h5 class="card-header bg-primary text-white">รางวัลเข้าร่วม</h5>
                                                    <div class="card-body">
                                                        <table class="table table-striped table-hover fs-14">
                                                            <thead>
                                                                <tr>
                                                                    <th width=''>#</th>
                                                                    <th width=''>คำนำหน้า</th>
                                                                    <th width=''>ชื่อ</th>
                                                                    <th width=''>นามสกุล</th>
                                                                    <th width=''>โรงเรียน</th>
                                                                    <th width=''>รางวัล</th>
                                                                    <th width=''>ชื่อการแข่งขัน</th>
                                                                    <th width=''>ชื่อผลงาน</th>
                                                                    <th width=''>อาจารย์ที่ปรึกษา</th>
                                                                    <th width=''>ยืนยันข้อมูล</th>
                                                                    <th width=''>id</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-14"> 
                                                                <?php
                                                                $i=0;
                                                                    $regis = $certificateObj->getAll($activity['id']);
                                                                    foreach($regis as $data){
                                                                        $i++;
                                                                        $tname ="";
                                                                        $tea = $teacherObj->getTeacherById($data['teacher_id']);
                                                                        $t=1;
                                                                        foreach($tea as $teacher){
                                                                            if($t>=2){
                                                                                $tname = $tname." และ "; 
                                                                            }
                                                                            $tname = $tname." ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname'];
                                                                            $t++;
                                                                        }
                                                                        $activity = $data['activity']." ".$data['level'];
                                                                        $ckdata['activity_id']=4;
                                                                        $ckdata['project_id']=$data['id'];
                                                                        $ck = $successObj->CheckSuccess($ckdata);
                                                                        if($ck){
                                                                            $success = "<i class='bx bxs-check-square text-success'></i>ok";
                                                                        }else{
                                                                            $success = "<i class='bx bxs-no-entry text-danger'></i>";
                                                                        }
                                                                        echo "
                                                                        <tr>
                                                                            <td width=''>{$i}</td>
                                                                            <td width=''>{$data['stitle']}</td>
                                                                            <td width=''>{$data['sname']}</td>
                                                                            <td width=''>{$data['ssurname']}</td>
                                                                            <td width=''>{$data['school']}</td>
                                                                            <td width=''>{$data['lang']}</td>
                                                                            <td width=''>{$activity}</td>
                                                                            <td width=''>เรื่อง {$data['artifact_name']}</td>
                                                                            <td width=''>อาจารย์ที่ปรึกษา {$tname}</td>
                                                                            <td width=''>{$success}</td>
                                                                            <td width=''>{$data['id']}</td>
                                                                        </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                           <?php
                                            break;
                                        case 2:
                                            ?>
                                                <div class="card">
                                                    <h5 class="card-header bg-primary text-white">รางวัลเข้าร่วม</h5>
                                                    <div class="card-body">
                                                        <table class="table table-striped table-hover fs-14">
                                                            <thead>
                                                                <tr>
                                                                    <th width=''>#</th>
                                                                    <th width=''>คำนำหน้า</th>
                                                                    <th width=''>ชื่อ</th>
                                                                    <th width=''>นามสกุล</th>
                                                                    <th width=''>โรงเรียน</th>
                                                                    <th width=''>รางวัล</th>
                                                                    <th width=''>ชื่อการแข่งขัน</th>
                                                                    <th width=''>ชื่อผลงาน</th>
                                                                    <th width=''>อาจารย์ที่ปรึกษา</th>
                                                                    <th width=''>ยืนยันข้อมูล</th>
                                                                    <th width=''>id</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-14"> 
                                                                <?php
                                                                $i=0;
                                                                    $regis = $certificateObj->getAll($activity['id']);
                                                                    foreach($regis as $data){
                                                                        $i++;
                                                                        $tname ="";
                                                                        $tea = $teacherObj->getTeacherById($data['teacher_id']);
                                                                        $t=1;
                                                                        foreach($tea as $teacher){
                                                                            if($t>=2){
                                                                                $tname = $tname." และ "; 
                                                                            }
                                                                            $tname = $tname." ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname'];
                                                                            $t++;
                                                                        }
                                                                        $activity = $data['activity']." ".$data['level'];
                                                                        $ckdata['activity_id']=4;
                                                                        $ckdata['project_id']=$data['id'];
                                                                        $ck = $successObj->CheckSuccess($ckdata);
                                                                        if($ck){
                                                                            $success = "<i class='bx bxs-check-square text-success'></i>ok";
                                                                        }else{
                                                                            $success = "<i class='bx bxs-no-entry text-danger'></i>";
                                                                        }
                                                                        echo "
                                                                        <tr>
                                                                            <td width=''>{$i}</td>
                                                                            <td width=''>{$data['stitle']}</td>
                                                                            <td width=''>{$data['sname']}</td>
                                                                            <td width=''>{$data['ssurname']}</td>
                                                                            <td width=''>{$data['school']}</td>
                                                                            <td width=''>{$data['lang']}</td>
                                                                            <td width=''>{$activity}</td>
                                                                            <td width=''>เรื่อง {$data['project_name']}</td>
                                                                            <td width=''>อาจารย์ที่ปรึกษา {$tname}</td>
                                                                            <td width=''>{$success}</td>
                                                                            <td width=''>{$data['id']}</td>
                                                                        </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php                                
                                            break;
                                        case 3:
                                            ?>
                                                <div class="card">
                                                    <h5 class="card-header bg-primary text-white">รางวัลเข้าร่วม</h5>
                                                    <div class="card-body">
                                                        <table class="table table-striped table-hover fs-14">
                                                            <thead>
                                                                <tr>
                                                                    <th width=''>#</th>
                                                                    <th width=''>คำนำหน้า</th>
                                                                    <th width=''>ชื่อ</th>
                                                                    <th width=''>นามสกุล</th>
                                                                    <th width=''>โรงเรียน</th>
                                                                    <th width=''>รางวัล</th>
                                                                    <th width=''>ชื่อการแข่งขัน</th>
                                                                    <th width=''>ชื่อผลงาน</th>
                                                                    <th width=''>อาจารย์ที่ปรึกษา</th>
                                                                    <th width=''>ยืนยันข้อมูล</th>
                                                                    <th width=''>id</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-14"> 
                                                                <?php
                                                                $i=0;
                                                                    $regis = $certificateObj->getAll($activity['id']);
                                                                    foreach($regis as $data){
                                                                        $i++;
                                                                        $tname ="";
                                                                        $tea = $teacherObj->getTeacherById($data['teacher_id']);
                                                                        $t=1;
                                                                        foreach($tea as $teacher){
                                                                            if($t>=2){
                                                                                $tname = $tname." และ "; 
                                                                            }
                                                                            $tname = $tname." ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname'];
                                                                            $t++;
                                                                        }
                                                                        $activity = $data['activity'];
                                                                        $ckdata['activity_id']=4;
                                                                        $ckdata['project_id']=$data['id'];
                                                                        $ck = $successObj->CheckSuccess($ckdata);
                                                                        if($ck){
                                                                            $success = "<i class='bx bxs-check-square text-success'></i>ok";
                                                                        }else{
                                                                            $success = "<i class='bx bxs-no-entry text-danger'></i>";
                                                                        }
                                                                        echo "
                                                                        <tr>
                                                                            <td width=''>{$i}</td>
                                                                            <td width=''>{$data['stitle']}</td>
                                                                            <td width=''>{$data['sname']}</td>
                                                                            <td width=''>{$data['ssurname']}</td>
                                                                            <td width=''>{$data['school']}</td>
                                                                            <td width=''>{$data['lang']}</td>
                                                                            <td width=''>{$activity}</td>
                                                                            <td width=''>เรื่อง {$data['iot_name']}</td>
                                                                            <td width=''>อาจารย์ที่ปรึกษา {$tname}</td>
                                                                            <td width=''>{$success}</td>
                                                                            <td width=''>{$data['id']}</td>
                                                                        </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php
                                            break;
                                        case 4:
                                            ?>
                                                <div class="card">
                                                    <h5 class="card-header  bg-primary text-white">รางวัลเข้าร่วม</h5>
                                                    <div class="card-body">
                                                        <table class="table table-striped table-hover fs-14">
                                                            <thead>
                                                                <tr>
                                                                    <th width=''>#</th>
                                                                    <th width=''>คำนำหน้า</th>
                                                                    <th width=''>ชื่อ</th>
                                                                    <th width=''>นามสกุล</th>
                                                                    <th width=''>โรงเรียน</th>
                                                                    <th width=''>รางวัล</th>
                                                                    <th width=''>ชื่อการแข่งขัน</th>
                                                                    <th width=''>ยืนยันข้อมูล</th>
                                                                    <th width=''>id</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-14"> 
                                                                <?php
                                                                $i=0;
                                                                    $regis = $certificateObj->getAll($activity['id']);
                                                                    foreach($regis as $data){
                                                                        $i++;
                                                                        $activity = $data['activity']." ".$data['level'];
                                                                        $ckdata['activity_id']=4;
                                                                        $ckdata['project_id']=$data['id'];
                                                                        $ck = $successObj->CheckSuccess($ckdata);
                                                                        if($ck){
                                                                            $success = "<i class='bx bxs-check-square text-success'></i>ok";
                                                                        }else{
                                                                            $success = "<i class='bx bxs-no-entry text-danger'></i>";
                                                                        }
                                                                        echo "
                                                                        <tr>
                                                                            <td width=''>{$i}</td>
                                                                            <td width=''>{$data['stitle']}</td>
                                                                            <td width=''>{$data['sname']}</td>
                                                                            <td width=''>{$data['ssurname']}</td>
                                                                            <td width=''>{$data['school']}</td>
                                                                            <td width=''>{$data['lang']}</td>
                                                                            <td width=''>{$activity}</td>
                                                                            <td width=''>{$success}</td>
                                                                            <td width=''>{$data['id']}</td>
                                                                        </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php
                                            break;
                                        case 6:
                                            ?>
                                                <div class="card">
                                                    <h5 class="card-header bg-primary text-white">รางวัลเข้าร่วม</h5>
                                                    <div class="card-body">
                                                        <table class="table table-striped table-hover fs-14">
                                                            <thead>
                                                                <tr>
                                                                    <th width=''>#</th>
                                                                    <th width=''>คำนำหน้า</th>
                                                                    <th width=''>ชื่อ</th>
                                                                    <th width=''>นามสกุล</th>
                                                                    <th width=''>โรงเรียน</th>
                                                                    <th width=''>รางวัล</th>
                                                                    <th width=''>ชื่อการแข่งขัน</th>
                                                                    <th width=''>ชื่อผลงาน</th>
                                                                    <th width=''>อาจารย์ที่ปรึกษา</th>
                                                                    <th width=''>ยืนยันข้อมูล</th>
                                                                    <th width=''>id</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody class="fs-14"> 
                                                                <?php
                                                                $i=0;
                                                                    $regis = $certificateObj->getAll($activity['id']);
                                                                    foreach($regis as $data){
                                                                        $i++;
                                                                        $tname ="";
                                                                        $tea = $teacherObj->getTeacherById($data['teacher_id']);
                                                                        $t=1;
                                                                        foreach($tea as $teacher){
                                                                            if($t>=2){
                                                                                $tname = $tname." และ "; 
                                                                            }
                                                                            $tname = $tname." ".$teacher['ttitle'].$teacher['tname']." ".$teacher['tsurname'];
                                                                            $t++;
                                                                        }
                                                                        $activity = $data['activity'];
                                                                        $ckdata['activity_id']=4;
                                                                        $ckdata['project_id']=$data['id'];
                                                                        $ck = $successObj->CheckSuccess($ckdata);
                                                                        if($ck){
                                                                            $success = "<i class='bx bxs-check-square text-success'></i>ok";
                                                                        }else{
                                                                            $success = "<i class='bx bxs-no-entry text-danger'></i>";
                                                                        }
                                                                        echo "
                                                                        <tr>
                                                                            <td width=''>{$i}</td>
                                                                            <td width=''>{$data['stitle']}</td>
                                                                            <td width=''>{$data['sname']}</td>
                                                                            <td width=''>{$data['ssurname']}</td>
                                                                            <td width=''>{$data['school']}</td>
                                                                            <td width=''>{$data['lang']}</td>
                                                                            <td width=''>{$activity}</td>
                                                                            <td width=''>เรื่อง {$data['micro_name']}</td>
                                                                            <td width=''>อาจารย์ที่ปรึกษา {$tname}</td>
                                                                            <td width=''>{$success}</td>
                                                                            <td width=''>{$data['id']}</td>
                                                                        </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php
                                            break;
                                    }
                                ?>
                                
                                <?php
                                    echo "
                                </div>
                            </div>
                        </div>
                       
                    ";
                }
            ?>
        </div>
    </div>
</body>
</html>