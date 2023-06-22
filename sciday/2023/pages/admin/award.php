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
        
        // $countTeam = $adminObj->getProjectByActivityLevel("count",$ac_id, $le_id);
        $data = $adminObj->getGroupByRound("data","online",$ac_id,$le_id);
        $count = count($data);
    ?>
    <nav class="container nav nav-pills flex-column flex-sm-row mt-2">
        <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="index.php">ย้อนกลับ</a>
    </nav>
    <div class="container-fluid mt-5">
        <div class="card">
            <h5 class="card-header bg-170">เลือกทีมที่ผ่านเข้ารอบสุดท้าย <?php echo "{$activity['name']} ({$level['name']}) ";?></h5>
            <div class="card-body">
                <div class="d-grid gap-2 mx-auto">
                    <?php
 // *******************************************************************************************************************************************************************
                        
                        if($ac_id == 4 OR $ac_id == 5){ 
                            $data1 = $adminObj->getGroupByRound("data","final",$ac_id,$le_id);
                            $count1 = count($data1);
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
                                            <th scope="col">คะแนน</th>
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
                                            $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"award");
                                           

                                            if($ck>0){
                                                $checked = "checked";
                                                $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"award")['score'];
                                            }else{
                                                $checked = "";
                                                $score = 0;
                                            }
                                            echo "    
                                                        <td>
                                                            {$pro['tel']}
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
                                    <button type="submit" class="btn btn-primary" name="ck_award">บันทึก</button>
                                </div>
                            </form>
                        <?php
 // ****************************************************************************************************************************************************************
                        }else{
                            $data2 = $adminObj->getGroupByRound("data","final",$ac_id,$le_id);
                            $count2 = count($data2);
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
                                            <th scope="col">คะแนนรอบตัดสิน</th>
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
                                            $id = $pro['pro_id'];
                                            $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"award");
                                            
                                            if($ck>0){
                                                $checked = "checked";
                                                $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"award")['score'];
                                            }else{
                                                $checked = "";
                                                $score = 0;
                                                // $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"doc")['score'];
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
                                                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' name='score[$id]' value='{$score}' size='5' >
                                                </div>
                                            </td>
                                        </tr>
                                    ";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                                    <button type="submit" class="btn btn-primary" name="ck_award">บันทึก</button>
                                </div>
                            </form>
                        <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
<!-- แสดงรายชื่อ ****************************************************************************************************************-->
       
<?php
            if($ac_id == 4 OR $ac_id == 5){ 
                $data1 = $adminObj->getGroupByRound("data","award",$ac_id,$le_id);
                $count1 = count($data1);
                // print_r($data1);
                ?>
                    <div class="card mt-3">
                        <h5 class="card-header bg-primary text-white">ทีมที่ผ่านเข้ารอบสุดท้ายที่คณะ <?php echo "{$activity['name']} ({$level['name']}) จำนวน {$count1} ทีม";?></h5>
                        <div class="card-body">
                            <div class="d-grid gap-2 mx-auto">
                                <?php
                                    echo "
                                        <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                                            <a class='btn btn-primary me-md-2' href='/science/sciday/2023/export_excel/award.php?ac_id={$ac_id}&le_id={$le_id}&name={$level['name']}&ac_name={$activity['name']}'>export Excel</a>
                                        </div>
                                    
                                    ";
                                ?>
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
                                                <th scope="col">คะแนน</th>
                                                <th scope="col" class='text-center'>อันดับที่</th>
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
                                                $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"final");
                                                
                                                if($ck>0){
                                                    $checked = "checked";
                                                    $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"final")['score'];
                                                }else{
                                                    $checked = "";
                                                    $score = 0;
                                                }
                                                echo "    
                                                            <td>
                                                                {$pro['tel']}
                                                            </td>
                                                            <td>
                                                                {$score}
                                                            </td>
                                                            <td class='text-center'>
                                                                <b>{$i}</b>
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
            }else{
                $data2 = $adminObj->getGroupByRound("data","award",$ac_id,$le_id);
                $count2 = count($data2);
                // print_r($data2);
                ?>
                    <div class="card mt-3">
                        <h5 class="card-header bg-170">ประกาศคะแนนรอบสุดท้าย <?php echo "{$activity['name']} ({$level['name']}) จำนวน {$count2} ทีม";?></h5>
                        <div class="card-body">
                            <div class="d-grid gap-2 mx-auto">
                                <?php
                                    echo "
                                        <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                                            <a class='btn btn-primary me-md-2' href='/science/sciday/2023/export_excel/award.php?ac_id={$ac_id}&le_id={$le_id}&name={$level['name']}&ac_name={$activity['name']}'>export Excel</a>
                                        </div>
                                    
                                    ";
                                ?>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr class="bg-246">
                                            <th scope="col">ที่</th>
                                            <th scope="col" style="width:30%">ชื่อผลงาน</th>
                                            <th scope="col">โรงเรียน</th>
                                            <th scope="col">ระดับ</th>
                                            <th scope="col">นักเรียน</th>
                                            <th scope="col">อาจารย์ที่ปรึกษา</th>
                                            <th scope="col">เบอร์ติดต่อ</th>
                                            <th scope="col">คะแนนรอบตัดสิน</th>
                                            <th scope="col">เกียรติบัตรระดับ</th>
                                            <th scope="col" class='text-center'>อันดับที่</th>
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
                                            $id = $pro['pro_id'];
                                            $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"award");
                                            $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"award")['score'];
                                            if($score>=41){
                                                $coin = "เหรียญทอง";
                                            }elseif($score>=31){
                                                $coin = "เหรียญเงิน";
                                            }elseif($score>=21){
                                                $coin = "เหรียญทองแดง";
                                            }else{
                                                $coin = "ผ่านเข้ารอบตัดสิน";
                                            }
                                            if($ck>0){
                                                $checked = "checked";
                                            }else{
                                                $checked = "";
                                            }
                                            echo "
                                                    </td>
                                                    <td>
                                                        {$pro['tel']}
                                                    </td>
                                                    <td class='text-center'>
                                                        {$score}
                                                    </td>
                                                    <td class='text-center'>
                                                        {$coin}
                                                    </td>
                                                    <th class='text-center'>
                                                        {$i}
                                                    </th>
                                                    
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