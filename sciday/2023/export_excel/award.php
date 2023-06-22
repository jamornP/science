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
        $data = $adminObj->getGroupByRound("data","final", $_GET['ac_id'], $_GET['le_id']);
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
        <?php
    }else{
        $data = $adminObj->getGroupByRound("data","award", $_GET['ac_id'], $_GET['le_id']);
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
                        <th scope="col">ใบประกาศเหรียญ</th>
                        <th scope="col">อันดับที่</th>
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
                        $ck = $adminObj->getGroupByProRound("count",$pro['pro_id'],"award");
                        $score = $adminObj->getGroupByProRound("data",$pro['pro_id'],"award")['score'];
                        if($score>=41){
                            $coin = "เกียรติบัตรระดับเหรียญทอง";
                        }elseif($score>=31){
                            $coin = "เกียรติบัตรระดับเหรียญเงิน";
                        }elseif($score>=21){
                            $coin = "เกียรติบัตรระดับเหรียญทองแดง";
                        }else{
                            $coin = "เกียรติบัตรผ่านเข้ารอบตัดสิน";
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
                                <td class='text-center'>
                                    {$i}
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