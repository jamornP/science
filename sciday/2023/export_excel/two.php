<?php
$name = $_GET['ac_name']."(".$_GET['name'].").xls";
header("Content-Type: application/xls;  charset=utf-8");
header("Content-Disposition: attachment; filename=".$name."; worksheet1=".$_GET['name']);
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php
// Load the database configuration file 
require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php";
session_start();

use App\Model\Sciday2023\Auth;

$authObj = new Auth;

use App\Model\Sciday2023\Admin;

$adminObj = new Admin;
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php //require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-kanit">
    <?php //require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php 
    if($_GET['ac_id']==4 OR $_GET['ac_id']==5){
        // $data = $adminObj->getProjectByActivityLevel("data", $_GET['ac_id'], $_GET['le_id']);
        $data = $adminObj->getGroupByRound("data","online", $_GET['ac_id'], $_GET['le_id']);
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
                                        <a href='http://sciserv01.sci.kmitl.ac.th/science/upload/sciday/file2023/{$pro['file_register']}' target='_blank' class='fs-24'>file</a>
                                    </td>
                        ";
                        // $userTel = $adminObj->getUserById($pro['u_id']);
                        echo "    
                                    <td>
                                        '{$pro['tel']}
                                    </td>
                                </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        <?php
    }else{
        $data = $adminObj->getGroupByRound("data","doc", $_GET['ac_id'], $_GET['le_id']);
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
                        // $userTel = $adminObj->getUserById($pro['u_id']);
                        // $tel = $userTel['tel'];
                        $path_ser = "http://sciserv01.sci.kmitl.ac.th";
                        echo "
                                                </td>
                                                <td>
                                                    <a href='{$path_ser}/science/upload/sciday/file2023/{$pro['file_register']}' target='_blank' class='fs-24'>file</a>
                                                </td>
                                                <td>
                                                    <a href='{$pro['link_video']}' target='_blank' class='text-danger fs-24'>video</a>
                                                </td>
                                                <td>
                                                    <a href='{$path_ser}/science/sciday/2023/pages/picture/index.php?id={$pro['img_id']}' target='_blank' class='text-success fs-24'>image</a>
                                                </td>
                                                <td>
                                                '{$pro['tel']}
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
   
</body>

</html>