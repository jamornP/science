
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Car\User;

$userObj = new User;
print_r($_POST);
$ck=explode("@",$_POST['email']);
if($ck[1]!='kmitl.ac.th'){
    header("location: /science/car/auth/register.php?msg=email");
    exit;
}
$result = $userObj->createUser($_POST);
if($result) {
    header("location: /science/car/pages/member/index.php");
}else {
    header("location: /science/car/auth/register.php?msg=error");
}

?>