<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    
    <?php 
        if (isset($_GET['msg'])) {
            if($_GET['msg']=='ok'){
                $mes="บันทึกข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
                
            }elseif($_GET['msg']=='delok'){
                $mes="ลบข้อมูลสำเร็จ";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";
            }elseif($_GET['msg']=='error'){
                $mes="บันทึกข้อมูลไม่สำเร็จ";
                echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
            }
        }
        if($_SESSION['activity']==99){
            $ac_id = $_GET['ac_id'];
        }else{
            $ac_id = $_SESSION['activity'];
        }
        
        $activity = $adminObj->getActivityById($ac_id);
        $le_id = $_GET['le_id'];
        $level = $adminObj->getLevelById($le_id);
        $countTeam = $adminObj->getProjectByActivityLevel("count",$ac_id, $le_id);
    ?>
    <nav class="container nav nav-pills flex-column flex-sm-row mt-2">
        <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="index.php">ย้อนกลับ</a>
    </nav>
    <div class="container-fluid mt-5">
        <div class="card">
            <?php
                if($ac_id == 4 OR $ac_id == 5){ 
                    $text = "เลือกและกรอกคะแนนทีมที่มาแข่งขัน รอบ Online ของ";
                }else{
                    $text = "ตรวจเอกสารรอบแรก พร้อมทั้งเลือกช่องเอกสาร ผ่าน และใส่คะแนนที่ได้ เพื่อเรียงลำดับจากคะแนนมากไปน้อย  ของ";
                }
            ?>
            <h5 class="card-header bg-170"><?php echo "{$text} {$activity['name']} ({$level['name']}) ";?></h5>
            <div class="card-body">
                <div class="d-grid gap-2 mx-auto">
                    <?php
                        $data = $adminObj->getProjectByActivityLevel("data", $ac_id, $le_id);
                        if($ac_id == 4 OR $ac_id == 5){ 
                            // echo "
                            //     <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                            //         <a class='btn btn-primary me-md-2' href='/science/sciday/2023/export_excel/index.php?ac_id={$ac_id}&le_id={$le_id}'>export Excel</a>
                            //     </div>
                            
                            // ";
                            ?>
                            <form action="save.php" method="post">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr class="bg-246">
                                            <th scope="col">ที่</th>
                                            <th scope="col">โรงเรียน</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">นักเรียน</th>
                                            <th scope="col">email</th>
                                            <th scope="col">อาจารย์ที่ปรึกษา</th>
                                            <th scope="col">เบอร์ติดต่อ</th>
                                            <th scope="col">online</th>
                                            <th scope="col">คะแนน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($data as $pro) {
                                            $i++;
                                            echo "
                                                    <tr>
                                                        <th scope='row'>$i</th>
                                                        <td>{$pro['school']}</td>
                                                        <td>{$pro['level']}</td>
                                                        <td>
                                            ";
                                            $students = $adminObj->getStudentById("data", $pro['stu_id']);
                                            $sj = count($students);
                                            $j = 0;
                                            foreach ($students as $stu) {
                                                $j++;
                                                $st = "{$stu['title']}{$stu['stu_name']} {$stu['stu_surname']}";
                                                echo $st;
                                                if ($j < $sj) {
                                                    echo "<br>";
                                                }
                                            }
                                            echo "
                                                        </td>
                                                        <td>
                                            ";
                                            $studentse = $adminObj->getStudentById("data", $pro['stu_id']);
                                            $sje = count($studentse);
                                            $je = 0;
                                            foreach ($studentse as $stue) {
                                                $je++;
                                                $ste = "{$stue['stu_email']}";
                                                echo $ste;
                                                if ($je < $sje) {
                                                    echo "<br>";
                                                }
                                            }
                                            echo "
                                                        </td>
                                                        <td>
                                            ";
                                            $teachers = $adminObj->getTeacherById("data", $pro['tea_id']);
                                            $tj = count($teachers);
                                            $j = 0;
                                            foreach ($teachers as $tea) {
                                                $j++;
                                                $tt = "{$tea['title']}{$tea['tea_name']} {$tea['tea_surname']}";
                                                echo $tt;
                                                if ($j < $tj) {
                                                    echo "<br>";
                                                }
                                            }
                                            $pro_id = base64_encode($pro['pro_id']);
                                            // $userTel = $adminObj->getUserById($pro['u_id']);
                                            $id = $pro['pro_id'];
                                            $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"online");
                                            
                                            if($ck>0){
                                                $checked = "checked";
                                                $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"online")['score'];
                                            }else{
                                                $checked = "";
                                                $score = 0;
                                            }
                                            echo "    
                                                        <td>
                                                            {$pro['tel']}
                                                        </td>
                                                        <td>
                                                            <div class='form-check'>
                                                                <input class='form-check-input' type='checkbox' value='{$pro['pro_id']}' id='flex{$pro['pro_id']}' name='pro_id[]' {$checked}>
                                                                <label class='form-check-label' for='flex{$pro['pro_id']}'>
                                                                แข่ง
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class='input-group input-group-sm mb-3'>
                                                                <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' name='score[$id]' value='{$score}' size='5'>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                                    <button type="submit" class="btn btn-primary" name="ck_online">บันทึก</button>
                                </div>
                            </form>
                        <?php
                        }else{
                            // echo "
                            //     <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                            //         <a class='btn btn-primary me-md-2' href='/science/sciday/2023/export_excel/index.php?ac_id={$ac_id}&le_id={$le_id}'>export Excel</a>
                            //     </div>
                            
                            // ";
                            ?>
                            <form action="save.php" method="post">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr class="bg-246">
                                            <th scope="col">ที่</th>
                                            <th scope="col" style="width:30%">ชื่อผลงาน</th>
                                            <th scope="col">โรงเรียน</th>
                                            <th scope="col">ระดับ</th>
                                            <th scope="col">นักเรียน</th>
                                            <th scope="col">อาจารย์ที่ปรึกษา</th>
                                            <th scope="col">ใบสมัคร</th>
                                            <th scope="col">video</th>
                                            <th scope="col">รูป</th>
                                            <th scope="col">เบอร์ติดต่อ</th>
                                            <th scope="col">เอกสาร</th>
                                            <th scope="col">คะแนนรอบแรก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;

                                        foreach ($data as $pro) {
                                            $i++;
                                            echo "
                                        <tr class='fs-14'>
                                            <th scope='row'>$i</th>
                                            <td>{$pro['p_name']}</td>
                                            <td>{$pro['school']}</td>
                                            <td>{$pro['level']}</td>
                                            <td>
                                        ";
                                            $students = $adminObj->getStudentById("data", $pro['stu_id']);
                                            $sj = count($students);
                                            $j = 0;
                                            foreach ($students as $stu) {
                                                $j++;
                                                $st = "{$stu['title']}{$stu['stu_name']} {$stu['stu_surname']}";
                                                echo $st;
                                                if ($j < $sj) {
                                                    echo "<br>";
                                                }
                                            }
                                            echo "
                                            </td>
                                            <td>
                                        ";
                                            $teachers = $adminObj->getTeacherById("data", $pro['tea_id']);
                                            $tj = count($teachers);
                                            $j = 0;
                                            foreach ($teachers as $tea) {
                                                $j++;
                                                $tt = "{$tea['title']}{$tea['tea_name']} {$tea['tea_surname']}";
                                                echo $tt;
                                                if ($j < $tj) {
                                                    echo "<br>";
                                                }
                                            }
                                            $pro_id = base64_encode($pro['pro_id']);
                                            // $userTel = $adminObj->getUserById($pro['u_id']);
                                            // $tel = $userTel['tel'];
                                            $id = $pro['pro_id'];
                                            $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"doc");
                                            if($ck>0){
                                                $checked = "checked";
                                                $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"doc")['score'];
                                            }else{
                                                $checked = "";
                                                $score = 0;
                                            }
                                            echo "
                                            </td>
                                            <td>
                                                <a href='/science/upload/sciday/file2023/{$pro['file_register']}' target='_blank' class='fs-24'><i class='bx bx-file'></i></a>
                                            </td>
                                            <td>
                                                <a href='{$pro['link_video']}' target='_blank' class='text-danger fs-24'><i class='bx bxl-youtube' ></i></i></a>
                                            </td>
                                            <td>
                                                <a href='/science/sciday/2023/pages/picture/index.php?id={$pro['img_id']}' target='_blank' class='text-success fs-24'><i class='bx bx-image'></i></a>
                                            </td>
                                            <td>
                                            {$pro['tel']}
                                            </td>
                                            <td>
                                                <div class='form-check'>
                                                    <input class='form-check-input' type='checkbox' value='{$pro['pro_id']}' id='flex{$pro['pro_id']}' name='pro_id[]' {$checked}>
                                                    <label class='form-check-label' for='flex{$pro['pro_id']}'>
                                                    ผ่าน
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class='input-group input-group-sm mb-3'>
                                                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' name='score[$id]' value='{$score}' size='5'>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                                    <button type="submit" class="btn btn-primary" name="ck_doc">บันทึก</button>
                                </div>
                            </form>
                        <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <!-- แสดงรายชื่อ ******************************************************************************************************************************************************-->
       
        <?php
            if($ac_id == 4 OR $ac_id == 5){ 
                $data1 = $adminObj->getGroupByRound("data","online",$ac_id,$le_id);
                $count1 = count($data1);
                // print_r($data1);
                ?>
                    <div class="card mt-3">
                        
                        <h5 class="card-header bg-170">ทีมที่เข้าแข่งขัน Online <?php echo "{$activity['name']} ({$level['name']}) จำนวน {$count1} ทีม";?></h5>
                        <div class="card-body">
                            <div class="d-grid gap-2 mx-auto">
                                <table class="table table-striped table-sm">
                                        <thead>
                                            <tr class="bg-246">
                                                <th scope="col">ที่</th>
                                                <th scope="col">โรงเรียน</th>
                                                <th scope="col">ประเภท</th>
                                                <th scope="col">นักเรียน</th>
                                                <th scope="col">email</th>
                                                <th scope="col">อาจารย์ที่ปรึกษา</th>
                                                <th scope="col">เบอร์ติดต่อ</th>
                                                <th scope="col">online</th>
                                                <th scope="col">คะแนนรอบออนไลน์</th>
                                                <th scope="col">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($data1 as $pro) {
                                                $i++;
                                                echo "
                                                        <tr>
                                                            <th scope='row'>$i</th>
                                                            <td>{$pro['school']}</td>
                                                            <td>{$pro['level']}</td>
                                                            <td>
                                                ";
                                                $students = $adminObj->getStudentById("data", $pro['stu_id']);
                                                $sj = count($students);
                                                $j = 0;
                                                foreach ($students as $stu) {
                                                    $j++;
                                                    $st = "{$stu['title']}{$stu['stu_name']} {$stu['stu_surname']}";
                                                    echo $st;
                                                    if ($j < $sj) {
                                                        echo "<br>";
                                                    }
                                                }
                                                echo "
                                                            </td>
                                                            <td>
                                                ";
                                                $studentse = $adminObj->getStudentById("data", $pro['stu_id']);
                                                $sje = count($studentse);
                                                $je = 0;
                                                foreach ($studentse as $stue) {
                                                    $je++;
                                                    $ste = "{$stue['stu_email']}";
                                                    echo $ste;
                                                    if ($je < $sje) {
                                                        echo "<br>";
                                                    }
                                                }
                                                echo "
                                                            </td>
                                                            <td>
                                                ";
                                                $teachers = $adminObj->getTeacherById("data", $pro['tea_id']);
                                                $tj = count($teachers);
                                                $j = 0;
                                                foreach ($teachers as $tea) {
                                                    $j++;
                                                    $tt = "{$tea['title']}{$tea['tea_name']} {$tea['tea_surname']}";
                                                    echo $tt;
                                                    if ($j < $tj) {
                                                        echo "<br>";
                                                    }
                                                }
                                                $pro_id = base64_encode($pro['pro_id']);
                                                // $userTel = $adminObj->getUserById($pro['u_id']);
                                                $id = $pro['pro_id'];
                                                $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"online");
                                                
                                                if($ck>0){
                                                    $checked = "checked";
                                                    $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"online")['score'];
                                                }else{
                                                    $checked = "";
                                                    $score = 0;
                                                }
                                                echo "    
                                                            <td>
                                                                {$pro['tel']}
                                                            </td>
                                                            <td>
                                                                <div class='form-check'>
                                                                    <input class='form-check-input' type='checkbox' value='{$pro['pro_id']}' id='flex{$pro['pro_id']}' name='pro_id[]' {$checked} disabled>
                                                                    <label class='form-check-label' for='flex{$pro['pro_id']}'>
                                                                    แข่ง
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class='input-group input-group-sm mb-3'>
                                                                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' name='score[$id]' value='{$score}' size='5' readonly>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href='/science/sciday/2023/pages/admin/save.php?del=del&pro_id={$pro['pro_id']}&round=online'>ลบ</a>
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
                    </div>
                <?php
                // *********************************************************************************************************************************************************************************************************
            }else{
                $data2 = $adminObj->getGroupByRound("data","doc",$ac_id,$le_id);
                $count2 = count($data2);
                // print_r($data2);
                ?>
                    <div class="card mt-3">
                        <h5 class="card-header bg-170">ทีมที่เอกสารผ่านแล้ว <?php echo "{$activity['name']} ({$level['name']}) จำนวน {$count2} ทีม";?></h5>
                        <div class="card-body">
                            <div class="d-grid gap-2 mx-auto">
                            <table class="table table-striped table-sm">
                                    <thead>
                                        <tr class="bg-246">
                                            <th scope="col">ที่</th>
                                            <th scope="col" style="width:30%">ชื่อผลงาน</th>
                                            <th scope="col">โรงเรียน</th>
                                            <th scope="col">ระดับ</th>
                                            <th scope="col">นักเรียน</th>
                                            <th scope="col">อาจารย์ที่ปรึกษา</th>
                                            <th scope="col">ใบสมัคร</th>
                                            <th scope="col">video</th>
                                            <th scope="col">รูป</th>
                                            <th scope="col">เบอร์ติดต่อ</th>
                                            <th scope="col">คะแนนรอบแรก</th>
                                            <th scope="col">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;

                                        foreach ($data2 as $pro) {
                                            $i++;
                                            echo "
                                                <tr class='fs-14'>
                                                    <th scope='row'>$i</th>
                                                    <td>{$pro['p_name']}</td>
                                                    <td>{$pro['school']}</td>
                                                    <td>{$pro['level']}</td>
                                                    <td>
                                            ";
                                            $students = $adminObj->getStudentById("data", $pro['stu_id']);
                                            $sj = count($students);
                                            $j = 0;
                                            foreach ($students as $stu) {
                                                $j++;
                                                $st = "{$stu['title']}{$stu['stu_name']} {$stu['stu_surname']}";
                                                echo $st;
                                                if ($j < $sj) {
                                                    echo "<br>";
                                                }
                                            }
                                            echo "
                                                    </td>
                                                    <td>
                                            ";
                                            $teachers = $adminObj->getTeacherById("data", $pro['tea_id']);
                                            $tj = count($teachers);
                                            $j = 0;
                                            foreach ($teachers as $tea) {
                                                $j++;
                                                $tt = "{$tea['title']}{$tea['tea_name']} {$tea['tea_surname']}";
                                                echo $tt;
                                                if ($j < $tj) {
                                                    echo "<br>";
                                                }
                                            }
                                            $pro_id = base64_encode($pro['pro_id']);
                                            // $userTel = $adminObj->getUserById($pro['u_id']);
                                            // $tel = $userTel['tel'];
                                            $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"doc");
                                            if($ck>0){
                                                $checked = "checked";
                                                $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"doc")['score'];
                                            }else{
                                                $checked = "";
                                                $score = 0;
                                            }
                                            echo "
                                                    </td>
                                                    <td>
                                                        <a href='/science/upload/sciday/file2023/{$pro['file_register']}' target='_blank' class='fs-24'><i class='bx bx-file'></i></a>
                                                    </td>
                                                    <td>
                                                        <a href='{$pro['link_video']}' target='_blank' class='text-danger fs-24'><i class='bx bxl-youtube' ></i></i></a>
                                                    </td>
                                                    <td>
                                                        <a href='/science/sciday/2023/pages/picture/index.php?id={$pro['img_id']}' target='_blank' class='text-success fs-24'><i class='bx bx-image'></i></a>
                                                    </td>
                                                    <td>
                                                        {$pro['tel']}
                                                    </td>
                                                    <td>
                                                        <div class='input-group input-group-sm mb-3'>
                                                            <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' name='score[$id]' value='{$score}' size='5' readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href='/science/sciday/2023/pages/admin/save.php?del=del&pro_id={$pro['pro_id']}&round=doc'>ลบ</a>
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
        ?>
               
<br>
<br>
<br>
<br>
<br>

</body>

</html>