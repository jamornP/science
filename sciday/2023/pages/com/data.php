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
            <h5 class="card-header bg-170"><?php echo "{$activity['name']} ({$level['name']}) จำนวน {$countTeam} ทีม";?></h5>
            <div class="card-body">
                <div class="d-grid gap-2 mx-auto">
                    <?php
                        $data = $adminObj->getProjectByActivityLevel("data", $ac_id, $le_id);
                        if($ac_id == 4 OR $ac_id == 5){ 
                            echo "
                                <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
                                    <a class='btn btn-primary me-md-2' href='/science/sciday/2023/export_excel/index.php?ac_id={$ac_id}&le_id={$le_id}'>export Excel</a>
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
                                        <th scope="col">ใบสมัคร</th>
                                        <th scope="col">เบอร์ติดต่อ</th>
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
                                        echo "
                                                    </td>
                                                    <td>
                                                        <a href='/science/upload/sciday/file2023/{$pro['file_register']}' target='_blank' class='fs-24'><i class='bx bx-file'></i></a>
                                                    </td>
                                        ";
                                        $userTel = $adminObj->getUserById($pro['u_id']);
                                        echo "    
                                                    <td>
                                                        {$userTel['tel']}
                                                    </td>
                                                </tr>
                                        ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        }else{?>
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
                                        <th scope="col">วันที่สมัคร</th>
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
                                        $userTel = $adminObj->getUserById($pro['u_id']);
                                        $tel = $userTel['tel'];
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
                                           {$tel}
                                        </td>
                                        <td>
                                           {$pro['date_at']}
                                        </td>
                                    </tr>
                                ";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        <?php
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
<br>

</body>

</html>