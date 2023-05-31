<?php 
require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";
use App\Model\Sciday2023\Auth;
$authObj = new Auth;
// print_r($_REQUEST); 
if($_REQUEST['action']=="add"){
    $data['email']=$_REQUEST['email'];
    $data['password']=$_REQUEST['password'];
    $data['name']=$_REQUEST['name'];
    $data['surname']=$_REQUEST['surname'];
    $data['tel']=$_REQUEST['tel'];
    $data['ck']=1;
    // print_r($data); 
    $ckAddUser = $authObj->addUser($data);
    if($ckAddUser){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/pages/auth/register.php?msg=ok'} , 0);
            </script>
        ";
    }else{
        echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/science/sciday/2023/pages/auth/register.php?msg=error'} , 0);
        </script>
    ";
    }
}
if($_REQUEST['action']=="edit"){
    $data['email']=$_REQUEST['email'];
    $data['tel']=$_REQUEST['tel'];
    $data['password']=$_REQUEST['password'];
    // print_r($data); 
    $ckEditUser = $authObj->ResetPassword($data);
    // echo "<br>".$ckEditUser;
    if($ckEditUser){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/pages/auth/reset_password.php?msg=ok'} , 0);
            </script>
        ";
    }else{
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/pages/auth/reset_password.php?msg=error'} , 0);
            </script>
        ";
    }
}


?>

