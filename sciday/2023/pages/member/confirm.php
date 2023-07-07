<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php"; ?>
<?php
session_start();
    use App\Model\Sciday2023\Auth;
    $authObj = new Auth;
    use App\Model\Sciday2023\Admin;
    $adminObj = new Admin;
    date_default_timezone_set('Asia/Bangkok');


if(isset($_GET['con'])){
    $pro_id = base64_decode($_GET['id']);
    // $project = $adminObj->getProjectById($_GET['pro_id']);
    echo "
        <script type='text/javascript'>
            let isExecuted = confirm('ยืนยัน ข้อมูลของคุณถูกต้องเรียบร้อยแล้ว ?');
            if (isExecuted == true) {
                location.href='/science/sciday/2023/pages/member/confirm.php?confirm=ok&id={$pro_id}';
            } else {
                location.href='/science/sciday/2023/pages/member';
            }
            console.log(isExecuted);
        </script>
    ";
}
if(isset($_GET['confirm'])){
    if($_GET['confirm']=='ok'){
        print_r($_REQUEST);
        $data['pro_id']=$_GET['id'];
        $data['date_confirm']=date("Y-m-d H:i:s");
        $ck = $adminObj->addConfirm($data);
        if($ck){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=con_ok'} , 0);
                </script>
            ";
        }else{
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=error'} , 0);
                </script>
            ";
        }
    }
}
?>