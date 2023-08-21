<?php
header("Content-Type: application/xls;  charset=utf-8");
header("Content-Disposition: attachment; filename=scidat2023.xls; worksheet1=เข้าร่วมการแข่งขัน;");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php"; ?>
<?php
    use App\Model\Sciday2023\Admin;
    $adminObj = new Admin;
    date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mt-5">
        <?php 
            if(isset($_POST['answer'])){
                ?>
                <table class="table">
            <thead>
                <tr>
                    <th>ที่</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>โรงเรียน</th>
                    <th>กิจกรรม</th>
                    <th>ระดับ</th>
                    <th>รางวัล</th>
                    <th>งาน</th>
                    <th>วันที่จัดงาน</th>
                    <th>pro_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "
                    select ti.name as title,stu.stu_name,stu.stu_surname,stu.school,ac.name as activity ,le.name as level,g.round,p.pro_id
                    from tb_group as g
                    left join tb_project as p on p.pro_id = g.pro_id
                    left join tb_student as stu on stu.stu_id = p.stu_id
                    left join tb_title as ti on ti.ti_id = stu.ti_id
                    left join tb_activity as ac on ac.ac_id = g.ac_id
                    left join tb_level as le on le.le_id = g.le_id
                    where g.round = 'online' 
                    ORDER BY ac.name,le.name
                ";
                $data = $adminObj->getSqlData($sql);
                $i=0;
                foreach($data as $st){
                    $i++;
                    $stu = $st['title'].$st['stu_name']." ".$st['stu_surname'];
                    echo "
                        <tr>
                            <td>{$i}</td>
                            <td>{$stu}</td>
                            <td>{$st['school']}</td>
                            <td>{$st['activity']}</td>
                            <td></td>
                            <td>เข้าร่วมการแข่งขัน</td>
                            <td>นิทรรศการวันวิทยาศาสตร์ ประจำปี 2566 ในหัวข้อ “Science Today is Technology Tomorrow”</td>
                            <td>ระหว่างวันที่ 4-5 สิงหาคม พ.ศ.2566</td>
                            <td>{$st['pro_id']}</td>
                        </tr>
                    ";
                }
                // echo "<pre>";
                // print_r($data);
                // echo"</pre>";
                ?>
                
            </tbody>
        </table>

                <?php

            }else{
                    ?>
<table class="table">
            <thead>
                <tr>
                    <th>ที่</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>โรงเรียน</th>
                    <th>ชื่อผลงาน</th>
                    <th>อาจารย์ที่ปรึกษา</th>
                    <th>กิจกรรม</th>
                    <th>ระดับ</th>
                    <th>รางวัล</th>
                    <th>งาน</th>
                    <th>วันที่จัดงาน</th>
                    <th>pro_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $_POST['sql'];
                $data = $adminObj->getSqlData($sql);
                $i=0;
                foreach($data as $st){
                    $i++;
                    $stu = $st['title'].$st['stu_name']." ".$st['stu_surname'];
                    $teacher = $adminObj->getTeacherById("data",$st['tea_id']);
                    if(count($teacher)>0){
                        $ta = "อาจารย์ที่ปรึกษา ";
                    }else{
                        $ta = "";
                    }
                    // echo "<pre>";
                    // print_r($teacher);
                    // echo"</pre>";
                    
                    
                    $j=0;
                    foreach($teacher as $tea){
                        $j++;
                        if($j>1){
                            $and = " และ ";
                        }else{
                            $and = "";
                        }
                        $ta .= $and.$tea['title'].$tea['tea_name']." ".$tea['tea_surname'];
                    }
                    echo "
                        <tr>
                            <td>{$i}</td>
                            <td>{$stu}</td>
                            <td>{$st['school']}</td>
                            <td>{$st['p_name']}</td>
                            <td>{$ta}</td>
                            <td>{$st['activity']}</td>
                            <td>{$st['level']}</td>
                            <td>เข้าร่วมการแข่งขัน</td>
                            <td>นิทรรศการวันวิทยาศาสตร์ ประจำปี 2566 ในหัวข้อ “Science Today is Technology Tomorrow”</td>
                            <td>ระหว่างวันที่ 4-5 สิงหาคม พ.ศ.2566</td>
                            <td>{$st['pro_id']}</td>
                        </tr>
                    ";
                }
                // echo "<pre>";
                // print_r($data);
                // echo"</pre>";
                ?>
                
            </tbody>
        </table>
                    <?php
            }
        ?>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>