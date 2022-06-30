<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php
use App\Model\Sciday\Auth;
$userObj = new Auth;

print_r($_REQUEST);
$data['email']=$_REQUEST['email'];
$data['tel']=$_REQUEST['tel'];
$ck=$userObj->checkEmail($data);
if($ck){
    $userObj->ResetPassword($_REQUEST);
    header("location: /science/sciday/auth/login.php?success=สำเร็จ");
}else{
    header("location: /science/sciday/auth/resetpass.php?msg=error");
} 

?>