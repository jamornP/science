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
        $ac_id = $_SESSION['activity'];
       
    ?>
    <?php
         if($ac_id==99){
            $activitys = $adminObj->getActivityAll("data");
            foreach($activitys as $activity){
                ?>
                <div class="container mt-5">
                    <div class="card">
                        <h5 class="card-header bg-170"><b><?php echo $activity['name'];?></b></h5>
                        <div class="card-body">
                            <div class='row mt-1'>
                                <div class='d-grid gap-2 col-6 mx-auto'>
                                    <button class='btn btn-info' >ประเภท</button>
                                </div>
                                <div class='d-grid gap-2 col-3 mx-auto'>
                                    <a class='btn btn-info text-white' >จำนวนทีมที่สมัคร</a>
                                </div>
                            </div>
                            <!-- <div class="d-grid gap-2 col-3 mx-auto"> -->
                                <?php
                                    $levels = $adminObj->getLevelByActivityAll($activity['ac_id']);
                                    foreach($levels as $level){
                                        $countTeam = $adminObj->getProjectByActivityLevel("count",$activity['ac_id'],$level['le_id']);
                                        echo "
                                            <div class='row mt-1'>
                                                <div class='d-grid gap-2 col-6 mx-auto'>
                                                    <a class='btn btn-primary' href='data.php?ac_id={$activity['ac_id']}&le_id={$level['le_id']}&name={$level['name']}'>{$level['name']}</a>
                                                </div>
                                                <div class='d-grid gap-2 col-3 mx-auto'>
                                                    <a class='btn btn-success text-white' href='data.php?ac_id={$activity['ac_id']}&le_id={$level['le_id']}&name={$level['name']}'>{$countTeam} ทีม</a>
                                                </div>
                                            </div>
                                        ";
                                    }
                                ?>
                                
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
        }else{
            $activity = $adminObj->getActivityById($ac_id);
            ?>
                <div class="container mt-5">
                    <div class="card">
                        <h5 class="card-header bg-170">กรุณาเลือก <b>ประเภท</b> <?php echo $activity['name'];?></h5>
                        <div class="card-body">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <?php
                                    $levels = $adminObj->getLevelByActivityAll($ac_id);
                                    foreach($levels as $level){
                                        $countTeam = $adminObj->getProjectByActivityLevel("count",$ac_id,$level['le_id']);
                                        echo "
                                            <a class='btn btn-primary' href='data.php?le_id={$level['le_id']}&name={$level['name']}'>{$level['name']} จำนวน {$countTeam} ทีม</a>
                                        ";
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    


</body>

</html>