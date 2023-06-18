<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>
    <style>
        .sbtn-remove,
        .sbtn-remove2,
        .tbtn-remove {
            display: none;
        }

        .dropzone .dz-preview .dz-remove {
            position: absolute;
            top: -10px;
            right: -10px;
            z-index: 999;
            color: rgba(200, 200, 200, 0.8);
        }
    </style>
</head>

<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php //print_r($_SESSION);
    if (isset($_GET['msg'])) {
        if($_GET['msg']=='ok'){
            $mes="บันทึกข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/activity/project.php?pages={$_GET['pages']}'} , 3000);
                </script>
            ";
        }elseif($_GET['msg']=='error'){
            $mes="บันทึกข้อมูลไม่สำเร็จ";
            echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
        }
    }
    ?>
    <div class="container mt-5">
        <div class="card">
            <?php
            $activity = $adminObj->getActivityByPages($_GET['pages']);
            $setting = $adminObj->getSettingByActivity($activity['ac_id']);
            // print_r($setting);
            $register = $setting['register'];
            $round2 = $setting['round2'];
            $round3 = $setting['round3'];
            $round4 = $setting['round4'];
            $bt_regis_show = $setting['bt_regis_show'];
            // print_r($activity);
            $color = "bg-307";
            ?>
            <h5 class="card-header <?php echo $color;?> text-white"><?php echo $activity['name']; ?></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                        echo "
                            <a href='/science/sciday/images/{$activity['images']}'><img src='/science/sciday/images/{$activity['images']}' class='d-block w-100 img-thumbnail shadow' alt='{$activity['name']}'></a>
                        ";
                        ?>

                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <h5 class="card-header bg-173 text-white">กำหนดการ</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                        echo "
                                            <a href='/science/sciday/images/{$activity['schedule']}' target='_blank'><img src='/science/sciday/images/{$activity['schedule']}' alt='' width='100%' height='500' class='-block w-100 img-thumbnail shadow'></a>
                                        ";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <p class="text-danger mt-2 fs-18"><b>หมายเหตุ : ในกรณีที่มีการส่งผลงานเข้าร่วมประกวดเข้ามาในระบบมากกว่า 1 ครั้ง</b><b class='text-primary'>(กรณี สมัครซ้ำ หรือท่านสามารถลบรายการที่สมัครซ้ำออกด้วยตัวท่านเองได้ ก่อนวันปิดรับสมัคร) </b><b>คณะวิทยาศาสตร์ขอสงวนสิทธิ์ในการพิจารณาเฉพาะผลงานในวันและเวลาล่าสุดเท่านั้น</b></p>
                </div>
            </div>
        </div>
        <div class="card mt-2 shadow">
            <?php
            $fileDoc = $adminObj->getDocumentById($activity['ac_id']);
            // print_r($fileDoc);
            ?>
            <h5 class="card-header bg-305 text-white">ขั้นตอนการสมัคร</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mt-2">
                            <h5 class="card-header bg-40">ขั้นตอนที่ 1 หลักเกณฑ์การประกวด</h5>
                            <div class="card-body">
                                <p>1.Download หลักเกณฑ์การประกวด</p>
                                <?php
                                if($fileDoc['doc_spec']!=""){
                                    echo "
                                        <a href='/science/upload/sciday/file2023/{$fileDoc['doc_spec']}' class='btn btn-primary'><h5'><i class='bx bx-file' ></i> เอกสารหลักเกณฑ์การประกวด</h5></a>
                                    ";
                                }else{
                                    echo "<p>Coming soon...</p>";
                                }
                                    
                                ?>
                                
                            </div>
                        </div>
                        <!-- <p class="mt-2">ขั้นตินที่ 1</p>
                        <p>เอกสารหลักเกณฑ์การประกวด</p> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-2">
                            <h5 class="card-header bg-40">ขั้นตอนที่ 2 Download ใบสมัคร </h5>
                            <div class="card-body">
                            <p>2.กรอกข้อมูลในใบสมัคร แล้ว scan เป็น PDF </p>
                                <?php
                                    if($fileDoc['doc_regis_pdf']!=""){
                                        echo "
                                            <a href='/science/upload/sciday/file2023/{$fileDoc['doc_regis_pdf']}' class='btn btn-primary'><h5'><i class='bx bx-file' ></i> ใบสมัคร PDF</h5></a>
                                        ";
                                    }else{
                                        echo "<p>Coming soon...</p>";
                                    }
                                    if($fileDoc['doc_regis_word']!=""){
                                        echo "
                                            <a href='/science/upload/sciday/file2023/{$fileDoc['doc_regis_word']}' class='btn btn-primary'><h5'><i class='bx bx-file' ></i> ใบสมัคร Word</h5></a>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- <p class="mt-2">ขั้นตอนที่ 2</p>
                        <p>Download ใบสมัคร กรอกข้อมูล</p> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="card mt-2">
                            <h5 class="card-header bg-40">ขั้นตอนที่ 3 ยื่นใบสมัคร</h5>
                            <div class="card-body">
                            <p>3.ยื่นเอกสารใบสมัคร ในระบบ</p>
                                <!-- <h5 class="card-title">เอกสารหลักเกณฑ์การประกวด</h5> -->
                                <?php
                                if ($bt_register) {
                                    if($bt_regis_show){
                                        echo "
                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='{$activity['pages']}'>ยื่นใบสมัคร</button>
                                        ";
                                    }else{
                                        echo "
                                            <button class='btn btn-danger'>ปิดรับสมัครแล้ว</button>
                                        ";
                                        
                                    }
                                    
                                }else{
                                    echo "<a class='btn btn-warning' href='/science/sciday/2023/pages/auth/login.php'> กรุณา เข้าสู่ระบบ</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- <p class="mt-2">ขั้นตอนที่ 3</p> -->

                    </div>
                </div>

            </div>

        </div>
        <br>
        <br>
        <br>
        <?php
        if ($register) {
            if($activity['pages'] == "artifact" or $activity['pages'] == "project" or $activity['pages'] == "iot" or $activity['pages'] == "microbit") {
        ?>
            <div class="card mt-2">
                <h5 class="card-header bg-193 text-white">รายชื่อทีมที่สมัครแล้ว</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr class="bg-246">
                                    <th scope="col">ที่</th>
                                    <th scope="col">ชื่อผลงาน</th>
                                    <th scope="col">โรงเรียน</th>
                                    <th scope="col">ระดับ</th>
                                    <th scope="col">นักเรียน</th>
                                    <th scope="col">อาจารย์ที่ปรึกษา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $projects =$adminObj->getProjectByActivity("data",$activity['ac_id']);
                                // print_r($projects);
                                $i=0;
                                foreach($projects as $pro){
                                    $i++;
                                    echo "
                                        <tr>
                                            <th scope='row'>$i</th>
                                            <td>{$pro['p_name']}</td>
                                            <td>{$pro['school']}</td>
                                            <td>{$pro['level']}</td>
                                            <td>
                                    ";
                                    $students = $adminObj->getStudentById("data",$pro['stu_id']);
                                    $sj=count($students);
                                    $j=0;
                                    foreach($students as $stu){
                                        $j++;
                                        $st = "{$stu['title']}{$stu['stu_name']} {$stu['stu_surname']}";
                                        echo $st;
                                        if($j<$sj){
                                            echo "<br>";
                                        }
                                    }
                                    echo "
                                            </td>
                                            <td>
                                        ";
                                    $teachers = $adminObj->getTeacherById("data",$pro['tea_id']);
                                    $tj=count($teachers);
                                    $j=0;
                                    foreach($teachers as $tea){
                                        $j++;
                                        $tt = "{$tea['title']}{$tea['tea_name']} {$tea['tea_surname']}";
                                        echo $tt;
                                        if($j<$tj){
                                            echo "<br>";
                                        }
                                    }    
                                    echo "
                                            </td>
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
            }elseif($activity['pages'] == "answer"){
        ?>
            <div class="card mt-2">
                <h5 class="card-header bg-193 text-white">รายชื่อทีมที่สมัครแล้ว</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">ที่</th>
                                    <th scope="col">โรงเรียน</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">นักเรียน</th>
                                    <th scope="col">อาจารย์ที่ปรึกษา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $projects =$adminObj->getProjectByActivity("data",$activity['ac_id']);
                                // print_r($projects);
                                $i=0;
                                foreach($projects as $pro){
                                    $i++;
                                    echo "
                                        <tr>
                                            <th scope='row'>$i</th>
                                            <td>{$pro['school']}</td>
                                            <td>{$pro['level']}</td>
                                            <td>
                                    ";
                                    $students = $adminObj->getStudentById("data",$pro['stu_id']);
                                    $sj=count($students);
                                    $j=0;
                                    foreach($students as $stu){
                                        $j++;
                                        $st = "{$stu['title']}{$stu['stu_name']} {$stu['stu_surname']}";
                                        echo $st;
                                        if($j<$sj){
                                            echo "<br>";
                                        }
                                    }
                                    echo "
                                            </td>
                                            <td>
                                        ";
                                    $teachers = $adminObj->getTeacherById("data",$pro['tea_id']);
                                    $tj=count($teachers);
                                    $j=0;
                                    foreach($teachers as $tea){
                                        $j++;
                                        $tt = "{$tea['title']}{$tea['tea_name']} {$tea['tea_surname']}";
                                        echo $tt;
                                        if($j<$tj){
                                            echo "<br>";
                                        }
                                    }    
                                    echo "
                                            </td>
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
        }
        ?>
        <?php
        if ($round2) {
        ?>
            <div class="card mt-2">
                <h5 class="card-header bg-193 text-white">รายชื่อทีมที่ผ่านเข้ารอบ 2</h5>
                <div class="card-body">
                </div>

            </div>
        <?php
        }
        ?>
        <?php
        if ($round3) {
        ?>
            <div class="card mt-2">
                <h5 class="card-header bg-193 text-white">รายชื่อทีมที่ผ่านเข้ารอบ 3</h5>
                <div class="card-body">
                </div>

            </div>
        <?php
        }
        ?>
        <?php
        if ($round4) {
        ?>
            <div class="card mt-2">
                <h5 class="card-header bg-193 text-white">รายชื่อทีมที่ผ่านเข้ารอบ 4</h5>
                <div class="card-body">
                </div>

            </div>
        <?php
        }
        ?>

    </div>
    <br>
    <br>
    <br>
    <!-- model register -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form action="save.php" method="post" enctype="multipart/form-data" id="from-post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ลงทะเบียน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if ($activity['pages'] == "artifact" or $activity['pages'] == "project" or $activity['pages'] == "iot" or $activity['pages'] == "microbit") {
                    ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <!-- <label for="ac_id" class="col-form-label">ac_id:</label> -->
                                <input type="hidden" class="form-control" id="ac_id" name="ac_id" value="<?php echo $activity['ac_id']; ?>" required>
                                <input type="hidden" class="form-control" id="pages" name="pages" value="<?php echo $activity['pages']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="p_name" class="col-form-label">1. ชื่อผลงาน <font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="text" class="form-control" id="p_name" name="p_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="le_id" class="col-form-label">2. ระดับ<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <br>
                                <?php
                                $levels = $adminObj->getLevelByActivity($activity['ac_id']);
                                foreach ($levels as $level) {
                                    echo "
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='le_id' id='{$level['le_id']}' value='{$level['le_id']}' required>
                                            <label class='form-check-label' for='{$level['le_id']}'>{$level['name']}</label>
                                        </div>
                                    ";
                                }
                                ?>

                            </div>
                            <div class="mb-3">
                                <label for="school" class="col-form-label">3. ชื่อสถาบันการศึกษา <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......' </b>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="text" class="form-control" id="school" name="school" placeholder="โรงเรียนพรตพิทยพยัต" required>
                            </div>
                            <div class="mb-3">
                                <label for="stu_id" class="col-form-label">4. ผู้เข้าประกวด<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="hidden" class="form-control" id="stu_id" name="stu_id" value="<?php echo "s-" . uniqid(); ?>">
                                <ol>
                                    <li>
                                        <div class="d-flex mb-2">
                                            <div class="">
                                                <select class="form-select" aria-label="Default select example" name="sti_id[]">
                                                    <option selected>คำนำหน้าชื่อ</option>
                                                    <?php
                                                    $titles = $adminObj->getTitleByGroup(1);
                                                    foreach ($titles as $title) {
                                                        echo "
                                                        <option value='{$title['ti_id']}'>{$title['name']}</option>
                                                    ";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]">
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="ssurname[]">
                                            </div>
                                            <button type="button" class="btn btn-success mx-2 sbtn-add text-white">เพิ่ม</button>
                                            <button class="btn btn-danger sbtn-remove text-white">ลบ</button>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="mb-3">
                                <label for="tea_id" class="col-form-label">5. อาจารย์ที่ปรึกษา<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="hidden" class="form-control" id="tea_id" name="tea_id" value="<?php echo "t-" . uniqid(); ?>">
                                <ol>
                                    <li>
                                        <div class="d-flex mb-2">
                                            <div class="">
                                                <select class="form-select" aria-label="Default select example" name="tti_id[]">
                                                    <option selected>คำนำหน้าชื่อ</option>
                                                    <?php
                                                    $titles = $adminObj->getTitleByGroup(2);
                                                    foreach ($titles as $title) {
                                                        echo "
                                                        <option value='{$title['ti_id']}'>{$title['name']}</option>
                                                    ";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]">
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="tsurname[]">
                                            </div>
                                            <button type="button" class="btn btn-success mx-2 tbtn-add text-white">เพิ่ม</button>
                                            <button class="btn btn-danger tbtn-remove text-white">ลบ</button>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="col-form-label">6. เบอร์โทรติดต่อผู้กรอกข้อมูล<font color="red">*</font>:</label>
                                <input type="text" class="form-control" id="tel" name="tel" required>
                            </div>
                            <div class="mb-3">
                                <label for="file_register" class="col-form-label">7. Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4 เป็นไฟล์ PDF เท่านั้น<font color="red">*</font>:</label>
                                <input class="form-control" type="file" id="file_register" name="file_register" accept=".pdf" required>
                            </div>
                            <div class="mb-3">
                                <label for="link_video" class="col-form-label">8. Link ดู video ผลงานบน Youtube <font color="red">*</font></b>:</label>
                                <input class="form-control" type="text" id="link_video" name="link_video" required>
                            </div>
                            <div class="mb-3">
                                <label for="img_id" class="col-form-label"> 9. Upload ไฟล์รูปภาพ รูปชิ้นงาน หรือรูปแสดงการสร้างชิ้นงาน<font color="red">( *.png หรือ *.jpg )</font> เท่านั้นไม่เกิน 5 รูป</b>:</label>
                                <input type="hidden" class="form-control" id="img_id" name="img_id" value="<?php echo "i-" . uniqid(); ?>" required>
                                <div class="container">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropzone" id="drop"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php
                    } elseif ($activity['pages'] == "answer") {
                    ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <!-- <label for="ac_id" class="col-form-label">ac_id:</label> -->
                                <input type="hidden" class="form-control" id="ac_id" name="ac_id" value="<?php echo $activity['ac_id']; ?>" required>
                                <input type="hidden" class="form-control" id="pages" name="pages" value="<?php echo $activity['pages']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="school" class="col-form-label">1. ชื่อสถาบันการศึกษา <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'</b>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="text" class="form-control" id="school" name="school" placeholder="โรงเรียนพรตพิทยพยัต" required>
                            </div>
                            <div class="mb-3">
                                <label for="le_id" class="col-form-label">2. ประเภท<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <br>
                                <?php
                                $levels = $adminObj->getLevelByActivity($activity['ac_id']);
                                foreach ($levels as $level) {
                                    echo "
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='le_id' id='{$level['le_id']}' value='{$level['le_id']}' required>
                                            <label class='form-check-label' for='{$level['le_id']}'>{$level['name']}</label>
                                        </div>
                                    ";
                                }
                                ?>

                            </div>

                            <div class="mb-3">
                                <label for="stu_id" class="col-form-label">3. ผู้เข้าประกวด<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="hidden" class="form-control" id="stu_id" name="stu_id" value="<?php echo "s-" . uniqid(); ?>">
                                <ol>
                                    <li>
                                        <div class="d-flex mb-2">
                                            <div class="">
                                                <select class="form-select" aria-label="Default select example" name="sti_id[]">
                                                    <option selected>คำนำหน้าชื่อ</option>
                                                    <?php
                                                    $titles = $adminObj->getTitleByGroup(1);
                                                    foreach ($titles as $title) {
                                                        echo "
                                                        <option value='{$title['ti_id']}'>{$title['name']}</option>
                                                    ";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]">
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="ssurname[]">
                                            </div>
                                            <button type="button" class="btn btn-success mx-2 sbtn-add2 text-white">เพิ่ม</button>
                                            <button class="btn btn-danger sbtn-remove2 text-white">ลบ</button>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="mb-3">
                                <label for="tea_id" class="col-form-label">4. อาจารย์ที่ปรึกษา<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="hidden" class="form-control" id="tea_id" name="tea_id" value="<?php echo "t-" . uniqid(); ?>">
                                <ol>
                                    <li>
                                        <div class="d-flex mb-2">
                                            <div class="">
                                                <select class="form-select" aria-label="Default select example" name="tti_id[]">
                                                    <option selected>คำนำหน้าชื่อ</option>
                                                    <?php
                                                    $titles = $adminObj->getTitleByGroup(2);
                                                    foreach ($titles as $title) {
                                                        echo "
                                                        <option value='{$title['ti_id']}'>{$title['name']}</option>
                                                    ";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]">
                                            </div>
                                            <div class="">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="tsurname[]">
                                            </div>
                                            <button type="button" class="btn btn-success mx-2 tbtn-add text-white">เพิ่ม</button>
                                            <button class="btn btn-danger tbtn-remove text-white">ลบ</button>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="col-form-label">5. เบอร์โทรติดต่อผู้กรอกข้อมูล<font color="red">*</font>:</label>
                                <input type="text" class="form-control" id="tel" name="tel" required>
                            </div>
                            <div class="mb-3">
                                <label for="file_register" class="col-form-label">6. Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4 เป็นไฟล์ PDF เท่านั้น<font color="red">*</font>:</label>
                                <input class="form-control" type="file" id="file_register" name="file_register" accept=".pdf" required>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            // modalTitle.textContent = 'New message to ' + recipient
            // modalBodyInput.value = recipient
        })
    </script>
    <script>
        $(function() {
            let i = 1;

            $("body").on("click", ".sbtn-add", function(e) {

                if (i < 3) {
                    i++;
                    e.preventDefault();
                    let ol = $(this).closest("ol")
                    let li = $(this).closest("li").clone()
                    li.appendTo(ol)
                    li.find("input").val("")
                    li.find(".sbtn-remove").show()
                    li.find("[name='sti_id[]']").focus()
                } else {

                }
                console.log(i);
            })

            $("body").on("click", ".sbtn-remove", function(e) {
                i = i - 1;
                e.preventDefault();
                $(this).closest("li").remove()
                console.log(i);
            })

            let j = 1;
            $("body").on("click", ".tbtn-add", function(e) {

                if (j < 2) {
                    j++;
                    e.preventDefault();
                    let ol = $(this).closest("ol")
                    let li = $(this).closest("li").clone()
                    li.appendTo(ol)
                    li.find("input").val("")
                    li.find(".tbtn-remove").show()
                    li.find("[name='tti_id[]']").focus()
                }
                console.log(j);
            })

            $("body").on("click", ".tbtn-remove", function(e) {
                j = j - 1;
                e.preventDefault();
                $(this).closest("li").remove()
                console.log(j);
            })

            let k = 1;

            $("body").on("click", ".sbtn-add2", function(e) {

                if (k < 2) {
                    k++;
                    e.preventDefault();
                    let ol = $(this).closest("ol")
                    let li = $(this).closest("li").clone()
                    li.appendTo(ol)
                    li.find("input").val("")
                    li.find(".sbtn-remove2").show()
                    li.find("[name='sti_id[]']").focus()
                } else {

                }
                console.log(i);
            })

            $("body").on("click", ".sbtn-remove2", function(e) {
                k = k - 1;
                e.preventDefault();
                $(this).closest("li").remove()
                console.log(k);
            })
        })
    </script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#drop", {
            url: "/science/sciday/project/uploader.php",
            addRemoveLinks: true,
            // autoProcessQueue: false,
            dictDefaultMessage: "วางไฟล์ที่นี้",
            dictCancelUpload: "<i class='material-icons'>cancel</i>",
            dictRemoveFile: "<i class='material-icons'>cancel</i>"

        });

        myDropzone.on("success", function(file) {
            console.log(file.xhr.response)
            let res = JSON.parse(file.xhr.response)
            console.log(res)
            file.previewElement.appendChild(
                Dropzone.createElement(`<input type="hidden" name="img_path[]" value="${res.img_path}">`)
            )
        })
    </script>
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
    <script>
        $('#exampleModal').on('shown.bs.modal', function() {
            if ("<?php echo $activity['pages']; ?>" == "answer") {
                $('#school').focus()
            } else {
                $('#p_name').focus()
            }
        });
    </script>
</body>

</html>