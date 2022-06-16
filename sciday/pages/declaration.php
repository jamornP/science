<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
use App\Model\Sciday\Activity;
$activityObj = new Activity; 
 use App\Model\Sciday\Showround;
 $showroundObj = new Showround; 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php //print_r($_SESSION);?>
    <div class="container">
        <div class="card mt-4">
            <h3 class="card-header">กำหนดการประกาศผล</h3>
            <form action="/science/sciday/backend/save.php" method="post">
            <div class="card-body">
                <h5 class="card-title">ประกาศผลรอบที่ 1</h5>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-check form-switch'>
                            <label class='form-check-label' for='flexSwitchCheckChecked'>กิจกรรม</label>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <label class='form-check-label' for=''>วันที่ (ปี-เดือน-วัน)</label>
                    </div>
                </div>
                <?php 
                    $shows = $showroundObj->getAllShowByRound(1);
                    foreach($shows AS $show){
                        $activity = $activityObj->getActivityById($show['activity_id']);
                        if($show['showround']=='yes'){
                            $ck = "checked";
                        }else{
                            $ck = "";
                        }
                        echo "
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckChecked' {$ck} name='showround[{$show['id']}]' value='{$show['id']}'>
                                        <label class='form-check-label' for='flexSwitchCheckChecked'>{$activity['name']}</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <input class='form-control form-control-sm' type='text'  value='{$show['date_show']}' name='date_show[{$show['id']}]'>
                                </div>
                                <div class='col-md-3'>
                                    <input class='form-control form-control-sm' type='hidden'  value='{$show['id']}' name='id[]'>
                                </div>
                            </div>
                            
                            
                        ";
                    }

                ?>
                <hr>
                <h5 class="card-title">ประกาศผลรอบที่ 2</h5>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-check form-switch'>
                            <label class='form-check-label' for='flexSwitchCheckChecked'>กิจกรรม</label>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <label class='form-check-label' for=''>วันที่ (ปี-เดือน-วัน)</label>
                    </div>
                </div>
                <?php 
                    $shows = $showroundObj->getAllShowByRound(2);
                    foreach($shows AS $show){
                        $activity = $activityObj->getActivityById($show['activity_id']);
                        if($show['showround']=='yes'){
                            $ck = "checked";
                        }else{
                            $ck = "";
                        }
                        echo "
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckChecked' {$ck} name='showround[{$show['id']}]' value='{$show['id']}'>
                                        <label class='form-check-label' for='flexSwitchCheckChecked'>{$activity['name']}</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <input class='form-control form-control-sm' type='text'  value='{$show['date_show']}' name='date_show[{$show['id']}]'>
                                </div>
                                <div class='col-md-3'>
                                    <input class='form-control form-control-sm' type='hidden'  value='{$show['id']}' name='id[]'>
                                </div>
                            </div>
                            
                            
                        ";
                    }

                ?>
                <hr>
                <h5 class="card-title">ประกาศผลรอบที่ 3</h5>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-check form-switch'>
                            <label class='form-check-label' for='flexSwitchCheckChecked'>กิจกรรม</label>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <label class='form-check-label' for=''>วันที่ (ปี-เดือน-วัน)</label>
                    </div>
                </div>
                <?php 
                    $shows = $showroundObj->getAllShowByRound(3);
                    foreach($shows AS $show){
                        $activity = $activityObj->getActivityById($show['activity_id']);
                        if($show['showround']=='yes'){
                            $ck = "checked";
                        }else{
                            $ck = "";
                        }
                        echo "
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-check form-switch'>
                                        <input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckChecked' {$ck} name='showround[{$show['id']}]' value='{$show['id']}'>
                                        <label class='form-check-label' for='flexSwitchCheckChecked'>{$activity['name']}</label>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <input class='form-control form-control-sm' type='text'  value='{$show['date_show']}' name='date_show[{$show['id']}]'>
                                </div>
                                <div class='col-md-3'>
                                    <input class='form-control form-control-sm' type='hidden'  value='{$show['id']}' name='id[]'>
                                </div>
                            </div>
                            
                            
                        ";
                    }

                ?>
                       
                <hr>
                <button type="submit" class="btn btn-primary mb-3">บันทึก</button>
            </div>
            </form>
        </div>
        
    </div>
</body>
</html>