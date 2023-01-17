<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Pr\User;

$userObj = new User;
print_r($_POST);

$result = $userObj->createUser($_POST);
if($result) {
    header("location: /science/pr");
}else {
    header("location: /science/pr/auth/register.php?msg=error");
}

?>