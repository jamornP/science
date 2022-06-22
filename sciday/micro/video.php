<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 print_r($_REQUEST);
use App\Model\Sciday\Round;
 $roundObj = new Round; 

 $ck = $roundObj->UpdateVideo($_REQUEST);
 if($ck){
     $project_id = base64_encode($_REQUEST['project_id']);
     header("location: /science/sciday/micro/member.php?micro_id={$project_id}");
 }

 ?>