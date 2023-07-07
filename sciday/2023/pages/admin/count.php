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
    <?php //print_r($_SESSION);
    ?>
    <div class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-170">สรุบยอด</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>กิจกรรม</th>
                            <th class='text-center'>จำนวนทีม</th>
                            <th class='text-center'>จำนวนนักเรียน</th>
                            <th class='text-center'>จำนวนคุณครู</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ac_all = $adminObj->getActivityAll("data");
                            // print_r($ac_all);
                            $sTeam = 0;
                            $sStudent = 0;
                            $sTeacher = 0;
                            foreach($ac_all as $ac){
                                echo "<tr>";
                                echo "  <td>{$ac['name']}</td>";
                                $cTeam = $adminObj->getProjectByActivity("count",$ac['ac_id']);
                                $sTeam += $cTeam; 
                                echo "  <td class='text-center'>{$cTeam}</td>";
                                $cStudent = $adminObj->getStudentByActivity("count",$ac['ac_id']);
                                $sStudent += $cStudent;
                                echo "  <td class='text-center'>{$cStudent}</td>";
                                $cTeacher = $adminObj->getTeacherByActivity("count",$ac['ac_id']);
                                $sTeacher += $cTeacher;
                                echo "  <td class='text-center'>{$cTeacher}</td>";
                                echo "</tr>";
                            }
                            
                            // echo number_format($sStudent);
                        ?>
                        
                    </tbody>
                    <tfoot>
                        <?php
                            $sTeam = number_format($sTeam);
                            $sStudent = number_format($sStudent);
                            $sTeacher = number_format($sTeacher);
                            echo "
                                <tr>
                                    <th class='text-center'>รวม</th>
                                    <th class='text-center'>{$sTeam}</th>
                                    <th class='text-center'>{$sStudent}</th>
                                    <th class='text-center'>{$sTeacher}</th>
                                </tr>
                            ";
                        ?>
                    </tfoot>
                </table>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card mt-2">
            <h5 class="card-header bg-170">ข้อมูลโรงเรียน</h5>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class='text-center'>ที่</th>
                            <th class='text-center' width="">โรงเรียน</th>
                            <?php
                                foreach($ac_all as $ac){
                                    echo "
                                        <th class='text-center' width='4%'>{$ac['pages']}</th>
                                    ";
                                }
                            ?>
                            <th class='text-center' width='6%'>รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            
                            $schools = $adminObj->getSql("data","SELECT * FROM `tb_project` GROUP BY school ORDER BY school");
                            // print_r($schools);
                            foreach($schools as $sc){
                                $i++;
                                $cProject =0;
                                
                                echo "<tr>";
                                echo "<td class='text-center'>{$i}</td>";
                                echo "<td>{$sc['school']}</td>";
                                foreach($ac_all as $ac){
                                    $j = $ac['pages'];
                                    $data['ac_id']= $ac['ac_id'];
                                    $data['school']= $sc['school'];
                                    // echo "SELECT * FROM tb_project WHERE school = '{$sc['school']}' AND ac_id ={$ac['ac_id']}"."<br>";
                                    $countAc = $adminObj->getSchoolByActivity("count",$data);
                                    $countArr[$i][$j] = $countAc;
                                    
                                    if($countAc == 0){
                                        echo "<td class='text-center'></td>";
                                    }else{
                                        echo "<td class='text-center'>{$countAc}</td>";
                                    }
                                    
                                    $cProject += $countAc;
                                    
                                }
                                echo "<th class='text-center'>{$cProject}</th>";
                                echo "</tr>";
                            }
                            // echo"<pre>";
                            //         print_r($countArr); 
                            //         echo"</pre>";
                        ?>
                    </tbody>
                    <tfoot>
                        <?php
                            foreach($ac_all as $ac){
                                $acName[] = $ac['pages'];
                                $sum[$ac['pages']]=0;
                            }
                            foreach($countArr as $ar){
                                foreach($acName as $a){
                                    $sum[$a] += $ar[$a];
                                }
                            }
                            echo "<tr>";
                            echo "<th></th>";
                            echo "<th class='text-center'>รวม</th>";
                            $sumAll = 0;
                            foreach($sum as $s){
                                $sumAll += $s;
                                echo "<th class='text-center'>{$s}</th>";
                            }
                            echo "<th class='text-center'>{$sumAll}</th>";
                            echo"</tr>";
                        ?>

                    </tfoot>
                </table>                    
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