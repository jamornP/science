<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Level;
 $levelObj = new Level;
 $levels = $levelObj->getLevelById($_REQUEST['level']);   
$level_name = $levels['name'];
 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Activity;
    $activityObj = new Activity; 
    $activitys = $activityObj->getActivityById($_REQUEST['activity']);
    $activity_name = $activitys['name'];
use App\Model\Sciday\Project;
 $projectObj = new Project;  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sciday</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
  

</head>

<body class="font-prompt fs-18">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name ;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-20">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp;ทีมที่สมัคร <?php echo $level_name;?></div>
                    
                    <table class="table table-striped table-hover mt-2 fs-18">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อโครงงานวิทยาศาสตร์</th>
                                <th>โรงเรียน</th>
                                <th>เอกสาร</th>
                                <th>รูป</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $pronames = $projectObj->getProjectByLevel($_REQUEST['level']);
                                $i=0;
                                foreach($pronames AS $proname){
                                    $i++;
                                    echo "
                                        <tr>
                                            <td width='8%'>{$i}.</td>
                                            <td>{$proname['project_name']}</td>
                                            <td width='30%'>{$proname['school']}</td>
                                            <td width='10%'><a href='/science/upload/sciday/file/{$proname['file_register']}' target='_blank'>Download</a></td>
                                            <td width='5%'><a href='/science/sciday/project/pic.php?activity={$activity_name}&p_id={$proname['id']}&image_id={$proname['images_id']}' target='_blank'>รูป</a></td>
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
</body>

</html>