<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php
use App\Model\Auth;
$userObj = new Auth;

$result = $userObj->checkUser($_POST);
if($result) {
    // if($_SESSION['role']=='admin'){
    //     header("location: /car/pages/book/index.php");
    // }else{
    //     header("location: /car/pages/member/index.php");
    // }
    header("location: /science/certificate/backend/index.php");
}else {
    header("location: /science/certificate/auth/login.php?msg=error");
}
?>