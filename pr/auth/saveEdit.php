<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Pr\User;

$userObj = new User;
print_r($_POST);

$result = $userObj->updateUser($_POST);
if($result) {
    header("location: /science/pr/pages/work");
}else {
    header("location: /science/pr/auth/edit.php?msg=error");
}

?>