<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
// print_r($_REQUEST);
use App\Model\Sciday\Round;
 $roundObj = new Round; 
    $data['activity_id'] = $_REQUEST['activity_id'];
    $data['level_id'] = $_REQUEST['level_id'];
    $data['num'] = $_REQUEST['num'];
    $data['link_video'] = $_REQUEST['link_video'];
 foreach($_REQUEST['p_id'] AS $key => $pro_id ){
    $data['project_id'] = $_REQUEST['p_id'][$key];
      $id = $roundObj->InsertRound($data);
 }
 
//  $id = $roundObj->InsertRound($_REQUEST);
 echo "<br>".$id; 
?>