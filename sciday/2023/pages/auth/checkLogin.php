<?php 
require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";
use App\Model\Sciday2023\Auth;
$authObj = new Auth;
// print_r($_REQUEST); 
// if($_REQUEST['action']=="add"){
//     $data['email']=$_REQUEST['email'];
//     $data['password']=$_REQUEST['password'];
//     $data['name']=$_REQUEST['name'];
//     $data['surname']=$_REQUEST['surname'];
//     $data['tel']=$_REQUEST['tel'];
//     $data['ck']=1;
    // print_r($data); 
    $ckUser = $authObj->checkUser($_REQUEST);
    if($ckUser['login']){
        if($ckUser['role']=="member"){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member'} , 0);
                </script>
            ";
        }elseif($ckUser['role']=="com"){
            echo "  
                <script type='text/javascript'>
                 setTimeout(function(){location.href='/science/sciday/2023/pages/com'} , 0);
                </script>
            ";

        }elseif($ckUser['role']=="admin"){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/admin'} , 0);
                </script>
            ";
        }elseif($ckUser['role']=="superadmin"){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/backend'} , 0);
                </script>
            ";
        }else{
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/index.php'} , 0);
                </script>
            ";
        }
        
    }else{
        echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/science/sciday/2023/pages/auth/login.php?msg=error'} , 0);
        </script>
    ";
    }
// }
// if($_REQUEST['action']=="edit"){
//     $data['email']=$_REQUEST['email'];
//     $data['password']=$_REQUEST['password'];
//     $data['name']=$_REQUEST['name'];
//     $data['surname']=$_REQUEST['surname'];
//     $data['tel']=$_REQUEST['tel'];
//     $data['ck']=1;
//     // print_r($data); 
//     // $ckAddUser = $authObj->addUser($data);
// }


?>