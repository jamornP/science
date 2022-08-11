
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
session_start();
// use App\Model\Car\User;

// $userObj = new User;
print_r($_POST);
// echo "<br>";
// $result = $userObj->checkUser($_POST);
// print_r($result);
// echo "<br>";
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
if($_POST['email']=='achi@kmitl.ac.th' AND $_POST['password']=='1234'){
    $_SESSION['login']=true;
    header("location: /science/webscience/pages/index.php");
}else {
     header("location: /science/webscience/auth/login.php?msg=error");
}
?>