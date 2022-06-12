<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Project;
 $projectObj = new Project;
 $projects = $projectObj->getProjectById($_REQUEST['p_id']);  
 use App\Model\Sciday\Level;
 $levelObj = new Level;
 $levels = $levelObj->getLevelById($projects['level_id']);   
 $level_name = $levels['name'];
  use App\Model\Sciday\Image;
  $imageObj = new Image;   
//  use App\Model\Sciday\Activity;
//     $activityObj = new Activity; 
//     $activitys = $activityObj->getActivityById($_REQUEST['activity']);
//     $activity_name = $activitys['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sciday 2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php //print_r($_REQUEST);?>
    <?php ?>

    <div class="container mt-3">
    <?php //print_r($projects);?>
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $_REQUEST['activity'] ;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3 fs-24">
                    <div class="rounded-pill bg-primary text-white">&nbsp;&nbsp;&nbsp; <?php echo "รูปภาพ ".$projects['project_name']." ระดับ".$projects['level'] ; ?> </div>
                
                    <div class="mt-2">
                        <?php
                        $images = $imageObj->getImageById($projects['images_id']);
                        foreach($images AS $image) {
                            echo "
                                <img src='{$image['images_path']}' class='img-thumbnail mt-1' alt='...'>
                            ";
                        }
                        ?>
                    
                    </div>
                </div>
            </div>
        </div>
        <?php 
           
        ?>
    <h3></h3>
    </div>
</body>
</html>