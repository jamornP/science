<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php

use App\Model\Car\User;
$userObj = new User;


if ($_REQUEST['action']=='edit'){
    if(isset($_REQUEST['role'])){
        $user = $_REQUEST;
        unset($user['action']);
        print_r($user);
        $userObj->updateUserAdmin($user,date("Y-m-d H:i:s"));
    }else{
    $user = $_REQUEST;
    unset($user['action']);
    print_r($user);
    $userObj->updateUser($user,date("Y-m-d H:i:s"));
    }
}elseif ($_REQUEST['action']=='delete'){
     $userObj->deleteUser($_REQUEST['id']);
}
  header('Location: /science/car/pages/user/index.php');
?>