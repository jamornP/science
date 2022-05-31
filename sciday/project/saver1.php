<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
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
       $id = $roundObj->InsertRound($data);
   }
   
 }
 if(isset($_REQUEST['round2'])){
   print_r($_REQUEST);
   $data['activity_id'] = $_REQUEST['activity_id'];
   $data['level_id'] = $_REQUEST['level_id'];
   $data['num'] = 3;
   $data['link_video'] = $_REQUEST['link_video'];
   foreach($_REQUEST['p_id'] AS $key => $pro_id ){
      $data['project_id'] = $_REQUEST['p_id'][$key];
      echo "<br>";
      print_r($data);
       $id = $roundObj->InsertRound($data);
   }
   
 }
   
 
//  $id = $roundObj->InsertRound($_REQUEST);
 echo "<br>".$id; 
  header("location: /science/sciday/project/manage.php?activity=2&level={$_REQUEST['level_id']}");
?>