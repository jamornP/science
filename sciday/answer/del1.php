<?php
print_r($_REQUEST);

?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
  
use App\Model\Sciday\Round;
$roundObj = new Round;

if($_REQUEST['num']==2){
    $ckRound3 = $roundObj->checkRound($_REQUEST['project_id'],3,$_REQUEST['activity_id'],$_REQUEST['level_id']);
    if($ckRound3){
        $del = $roundObj->delRound($_REQUEST['project_id'],3,$_REQUEST['activity_id'],$_REQUEST['level_id']);
        echo "มี3";
    }else{
        echo "ไม่มี 3";
    }
    
    $del = $roundObj->delRound($_REQUEST['project_id'],2,$_REQUEST['activity_id'],$_REQUEST['level_id']);
    $project_id = base64_encode($_REQUEST['level_id']);
     header("location: /science/sciday/answer/manage.php?level={$project_id}");
}
if($_REQUEST['num']==3){
    $del = $roundObj->delRound($_REQUEST['project_id'],3,$_REQUEST['activity_id'],$_REQUEST['level_id']);
    $project_id = base64_encode($_REQUEST['level_id']);
     header("location: /science/sciday/answer/manage.php?level={$project_id}");
    
}
?>