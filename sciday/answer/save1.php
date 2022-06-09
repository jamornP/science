<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php
use App\Model\Sciday\Round;
$roundObj = new Round; 
if(isset($_REQUEST['round1'])){
    print_r($_REQUEST);
    $data['activity_id'] = $_REQUEST['activity_id'];
    $data['level_id'] = $_REQUEST['level_id'];
    $data['num'] = 2;
    $data['link_video'] = $_REQUEST['link_video'];
    foreach($_REQUEST['p_id'] AS $key => $pro_id ){
      $data['project_id'] = $_REQUEST['p_id'][$key];
      echo "<br>";
      print_r($data);
      $ckRound = $roundObj->getRoundByAll($data['project_id'],$data['num'],$data['activity_id'],$data['level_id']);
      if($ckRound){
        echo "มีแล้ว";
      }else{
        echo "ยังไม่มี";
         $id = $roundObj->InsertRound($data);
      }
      
    }
    $level_id=base64_encode($_REQUEST['level_id']);
    header("location: /science/sciday/answer/manage.php?level={$level_id}");
}

?>