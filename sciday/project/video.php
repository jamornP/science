<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
// print_r($_REQUEST);
use App\Model\Sciday\Round;
 $roundObj = new Round; 

 $ck = $roundObj->UpdateVideo($_REQUEST);
 if($ck){
     header("location: /science/sciday/project/member.php?activity=2&project_id={$_REQUEST['project_id']}");
 }

 ?>
