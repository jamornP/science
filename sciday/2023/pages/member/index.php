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
            $mes="แก้ไขข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member'} , 2000);
                </script>
            ";
        }elseif($_GET['msg']=='error'){
            $mes="แก้ไขข้อมูลไม่สำเร็จ";
            echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
        }elseif($_GET['msg']=='del_ok'){
            $mes="ลบข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member'} , 2000);
                </script>
            ";
        }elseif($_GET['msg']=='add_ok'){
            $mes="บันทึกข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member'} , 2000);
                </script>
            ";
        }elseif($_GET['msg']=='add_error'){
            $mes="บันทึกข้อมูลไม่สำเร็จ";
            echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
        }elseif($_GET['msg']=='con_ok'){
            $mes="ยืนยันข้อมูลเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member'} , 2000);
                </script>
            ";
        }
    }

    ?>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header bg-170">ข้อมูลการสมัคร</h5>
            <div class="card-body">
                <div class="table-responsive">

                    <?php
                    $activitys = $adminObj->getActivityAll("data");
                    // print_r($activitys);

                    foreach ($activitys as $ac) {
                        $data = $adminObj->getProjectByActivityUserId("data", $ac['ac_id'], $_SESSION['user_id']);
                        $setting = $adminObj->getSettingByActivity($ac['ac_id']);
                        // print_r($setting);
                        $bt_edit = $setting['bt_edit'];
                        $bt_del = $setting['bt_del'];
                        $bt_con = $setting['bt_con'];
                        $bt_editcer = $setting['bt_editcer'];
                        $bt_atten = $setting['bt_atten'];
                        if (count($data) > 0) {
                            if ($ac['ac_id'] == 4 OR $ac['ac_id'] == 5 ) {
                                echo "
                                <p><span class='badge rounded-pill bg-primary fs-16'> {$ac['name']} </span></p>
                                ";
                        ?>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr class="bg-246 fs-12">
                                            <th scope="col">ที่</th>
                                            <th scope="col" width="25%">โรงเรียน</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">นักเรียน</th>
                                            <th scope="col">อาจารย์ที่ปรึกษา</th>
                                            <th scope="col">ใบสมัคร</th>
                                            <th scope="col" width="12%">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($data as $pro) {

                                            $i++;
                                            echo "
                                                 <tr class='fs-12'>
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
                                            echo "
                                                     </td>
                                                     <td>
                                                <a href='/science/upload/sciday/file2023/{$pro['file_register']}' target='_blank' class='fs-24'><i class='bx bx-file'></i></a>
                                            </td>
                                            <td>
                                            ";
                                            if($bt_edit){
                                                echo "
                                                    <a href='/science/sciday/2023/pages/member/edit.php?id={$pro_id}' class='btn btn-sm btn-warning shadow text-white'>แก้ไข</a>
                                                ";
                                            }
                                            if($bt_del){
                                                echo "
                                                    <a href='/science/sciday/2023/pages/member/del.php?id={$pro_id}' class='btn btn-sm btn-danger shadow text-white' >ลบ</a><br>
                                                ";
                                            }
                                            if($bt_editcer){
                                                echo "
                                                    <a href='/science/sciday/2023/pages/member/edit2.php?id={$pro_id}' class='btn btn-sm btn-warning shadow text-white'>แก้ไข</a>
                                                ";
                                            }
                                            if($bt_con){
                                                $ckConfirm = $adminObj->getConfirmByProject("count",$pro['pro_id']);
                                                // echo $ckConfirm;
                                                if($ckConfirm > 0){
                                                    echo "
                                                        <a href='' class='btn btn-sm btn-success shadow text-white mt-1' >ยืนยันข้อมูล<br>เรียบร้อย</a>
                                                    ";
                                                }else{
                                                    echo "
                                                        <a href='/science/sciday/2023/pages/member/confirm.php?con=ok&id={$pro_id}' class='btn btn-sm btn-primary shadow text-white mt-1' >คลิก เพื่อยืนยัน<br> ว่าตรวจสอบข้อมูล<br> ถูกต้องแล้ว</a>
                                                    ";
                                                }
                                            }
                                            if($bt_atten){
                                                $ckfinal = $adminObj->getGroupByProRound("count",$pro['pro_id'],"final");
                                                if($ckfinal > 0){
                                                    $pro_i = base64_encode($pro['pro_id']);
                                                    echo "<br>";
                                                    echo "
                                                        <a href='/science/sciday/2023/pages/member/atten.php?pro_id={$pro_i}' class='btn btn-sm btn-danger shadow text-white mt-1'>แจ้งความประสงค์เข้าร่วมรอบตัดสิน</a>
                                                    ";
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
                            <?php
                            } else {
                                echo "
                                <p><span class='badge rounded-pill bg-primary fs-16'> {$ac['name']} </span></p>
                                ";
                                // if($ac['line']!=""){
                                //     echo "
                                //     <br>
                                // <img src='/science/sciday/images/{$ac['line']}' class='rounded mx-auto d-block' alt='{$ac['line']}'>
                                // <b><p class='text-center text-danger fs-24'>* กรุณา scan QRcode Line OpenChate ใช้เพื่อสื่อสารข้อมูลของกิจกรรม *</p></b>
                                //     ";
                                // }
                            ?>
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr class="bg-246 fs-12">
                                            <th scope="col">ที่</th>
                                            <th scope="col" width="25%">ชื่อผลงาน</th>
                                            <th scope="col">โรงเรียน</th>
                                            <th scope="col">ระดับ</th>
                                            <th scope="col">นักเรียน</th>
                                            <th scope="col">อาจารย์ที่ปรึกษา</th>
                                            <th scope="col">ใบสมัคร</th>
                                            <th scope="col">video</th>
                                            <th scope="col">รูป</th>
                                            <th scope="col" width="12%">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;

                                        foreach ($data as $pro) {
                                            $i++;
                                            echo "
                                    <tr class='fs-12'>
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
                                            ";
                                            if($bt_edit){
                                                echo "
                                                    <a href='/science/sciday/2023/pages/member/edit.php?id={$pro_id}' class='btn btn-sm btn-warning shadow text-white'>แก้ไข</a>
                                                ";
                                            }
                                            if($bt_del){
                                                echo "
                                                    <a href='/science/sciday/2023/pages/member/del.php?id={$pro_id}' class='btn btn-sm btn-danger shadow text-white' >ลบ</a><br>
                                                ";
                                            }
                                            if($bt_editcer){
                                                echo "
                                                    <a href='/science/sciday/2023/pages/member/edit2.php?id={$pro_id}' class='btn btn-sm btn-warning shadow text-white'>แก้ไข</a>
                                                ";
                                            }
                                            if($bt_con){
                                                $ckConfirm = $adminObj->getConfirmByProject("count",$pro['pro_id']);
                                                // echo $ckConfirm;
                                                if($ckConfirm > 0){
                                                    echo "
                                                        <a href='' class='btn btn-sm btn-success shadow text-white mt-1' >ยืนยันข้อมูล<br>เรียบร้อย</a>
                                                    ";
                                                }else{
                                                    echo "
                                                        <a href='/science/sciday/2023/pages/member/confirm.php?con=ok&id={$pro_id}' class='btn btn-sm btn-primary shadow text-white mt-1' >คลิก เพื่อยืนยัน<br> ว่าตรวจสอบข้อมูล<br> ถูกต้องแล้ว</a>
                                                    ";
                                                }
                                            }
                                            if($bt_atten){
                                                $ckfinal = $adminObj->getGroupByProRound("count",$pro['pro_id'],"final");
                                                if($ckfinal > 0){
                                                    $pro_i = base64_encode($pro['pro_id']);
                                                    echo "<br>";
                                                    echo "
                                                        <a href='/science/sciday/2023/pages/member/atten.php?pro_id={$pro_i}' class='btn btn-sm btn-danger shadow text-white mt-1'>แจ้งความประสงค์เข้าร่วมรอบตัดสิน</a>
                                                    ";
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
                                <hr>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
</body>

</html>