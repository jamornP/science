<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php
use App\Model\Car\User;
$userObj = new User;

print_r($_REQUEST);
$data['email']=$_REQUEST['email'];
$data['tel']=$_REQUEST['tel'];
$ck=$userObj->checkEmail($data);
if($ck){
    $userObj->ResetPassword($_REQUEST);
    header("location: /science/car/auth/login.php?success=สำเร็จ");
}else{
    header("location: /science/car/auth/resetpass.php?msg=error");
} 

?>