<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
// print_r($_REQUEST);
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
      $ckRound = $roundObj->getRoundById($data['project_id'],$data['num']);
      if($ckRound){

      }else{
        $id = $roundObj->InsertRound($data);
      }
      
    }
    header("location: /science/sciday/project/manage.php?activity=2&level={$_REQUEST['level_id']}");
 }
 if(isset($_REQUEST['round2'])){
   print_r($_REQUEST);
   $data2['activity_id'] = $_REQUEST['activity_id2'];
   $data2['level_id'] = $_REQUEST['level_id2'];
   $data2['num'] = 3;
   $data2['link_video'] = $_REQUEST['link_video2'];
   foreach($_REQUEST['p_id2'] AS $key => $pro_id ){
      $data2['project_id'] = $_REQUEST['p_id2'][$key];
      echo "<br>";
      print_r($data2);
      $ckRound2 = $roundObj->getRoundById($data2['project_id'],$data2['num']);
      if($ckRound2){

      }else{
        $id2 = $roundObj->InsertRound($data2);
      }

   }
   header("location: /science/sciday/project/manage.php?activity=2&level={$_REQUEST['level_id']}");
 }
   
 
//  $id = $roundObj->InsertRound($_REQUEST);
 echo "<br>".$id2; 
   
?>