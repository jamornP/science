<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Pr\User;

$userObj = new User;
print_r($_POST);
echo "<br>";
$result = $userObj->checkUser($_POST);
print_r($result);
echo "<br>";
// if(password_verify($_POST['password'],$result['password'])) {
// echo "<br>true";
// }else{
//     echo "<br>false";
// }

// $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);

// if (password_verify('test', $hash)) {
//     echo 'Password is valid!';
//     echo "<br>".$hash;
// } else {
//     echo 'Invalid password.';
// }
if($result) {
   
        header("location: /science/pr/pages/work");
    
    
}else {
    header("location: /science/pr/auth/login.php?msg=error");
}
?>