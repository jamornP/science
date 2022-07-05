<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
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
    <div class="container">
        <div class="mt-2 card shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
                <h3>สรุปทีมที่สัมคร กิจกรรงานวันวิทยาศาสตร์ 2022 </h3>(Update : <?php echo date("d-m-Y");?>)
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                        $activitys = $activityObj->getActivityByYear('2022');
                        foreach($activitys AS $activity){
                            $activity_id=base64_encode($activity['id']);
                            switch ($activity['id']) {
                                case 1:
                                  $sql="SELECT * FROM tb_artifact";
                                  $remark="";
                                  break;
                                case 2:
                                  $sql="SELECT * FROM tb_project";
                                  $remark="";
                                  break;
                                case 3:
                                  $sql="SELECT * FROM tb_iot";
                                  $remark="";
                                  break;
                                case 4:
                                  $sql="SELECT * FROM tb_answer";
                                  $remark="";
                                  break;
                                case 5:
                                  $sql="SELECT * FROM tb_esports";
                                  $remark="หมายเหตุ จำนวนทีมที่สมัครอยู่ที่ชมรม Esports";
                                  break;
                                case 6:
                                  $sql="SELECT * FROM tb_micro";
                                  $remark="";
                                  break;
                            }

                            $count=$activityObj->getAllByActivity($sql);
                            echo "
                                <div class='col-md-4 mt-2'>
                                    <div class='d-flex position-relative'>
                                        <img src='/science/sciday/images/{$activity['id']}.png' class='flex-shrink-0 me-3 w-50 shadow mb-5 ' alt='{$activity['name']}'>
                                        
                                        <div class=''>
                                            <h5 class='text-center mt-0'>จำนวนทีมที่สมัคร</h5>

                                            <div class='text-center mt-5 '>
                                                <p class='fs-36 text-primary'>{$count}</p>
                                                <br>
                                                
                                                <a href='{$activity['link']}?activity={$activity_id}' class='stretched-link'></a>
                                            </div>   
                                            <h5 class='text-center mt-0'>ทีม</h5>
                                            <p class='mt-2 fs-16'>{$remark}</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>