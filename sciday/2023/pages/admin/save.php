<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php"; ?>
<?php
session_start();
    use App\Model\Sciday2023\Auth;
    $authObj = new Auth;
    use App\Model\Sciday2023\Admin;
    $adminObj = new Admin;
    date_default_timezone_set('Asia/Bangkok');

// print_r($_REQUEST); 
// ************************************* รอบแข่งออนไลน์ ****************************************************
if(isset($_POST['ck_online'])){
    // echo "Online";
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
   
    foreach($_POST['pro_id'] as $key=>$pro_id){
        $project = $adminObj->getProjectById($pro_id);
        if($adminObj->ckProjectInGropu($pro_id,$project['ac_id'],$project['le_id'],"online")){
            // echo "มีแล้ว<br>";
            $data2['pro_id']=$pro_id;
            $data2['ac_id']=$project['ac_id'];
            $data2['le_id']=$project['le_id'];
            $data2['round']="online";
            $data2['score']=$_POST['score'][$pro_id];
            // print_r($data2);
            // echo "Update<br>";
            $ckupdate = $adminObj->updateGroup($data2);
        }else{
            // echo "ยังไม่มี<br>";
            $data['pro_id']=$pro_id;
            $data['ac_id']=$project['ac_id'];
            $data['le_id']=$project['le_id'];
            $data['round']="online";
            $data['score']=$_POST['score'][$pro_id];
            $data['year']=date("Y");
            // print_r($data);
            // echo "Add<br>";
            $ckadd = $adminObj->addGroup($data);
        }
    }
    echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/science/sciday/2023/pages/admin/data.php?msg=ok&ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}'} , 1);
        </script>
    ";
}
// ************************************* รอบแรก ****************************************************

if(isset($_POST['ck_doc'])){
    // echo "Document";
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    //แยกข้อมูล Array
    foreach($_POST['pro_id'] as $key=>$pro_id){
        // echo $pro_id."<br>";
        $project = $adminObj->getProjectById($pro_id);
        if($adminObj->ckProjectInGropu($pro_id,$project['ac_id'],$project['le_id'],"doc")){
            // echo "มีแล้ว<br>";
            $data2['pro_id']=$pro_id;
            $data2['ac_id']=$project['ac_id'];
            $data2['le_id']=$project['le_id'];
            $data2['round']="doc";
            $data2['score']=$_POST['score'][$pro_id];
            // print_r($data2);
            // echo "Update<br>";
            $ckupdate = $adminObj->updateGroup($data2);
        }else{
            // echo "ยังไม่มี<br>";
            $data['pro_id']=$pro_id;
            $data['ac_id']=$project['ac_id'];
            $data['le_id']=$project['le_id'];
            $data['round']="doc";
            $data['score']=$_POST['score'][$pro_id];
            $data['year']=date("Y");
            // print_r($data);
            // echo "<br>";
            $ckadd = $adminObj->addGroup($data);
        }
    }
    echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/science/sciday/2023/pages/admin/data.php?msg=ok&ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}'} , 1);
        </script>
    ";
}


// ************************************* รอบสุดท้าย ****************************************************

if(isset($_POST['ck_final'])){
    // echo "Final";
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    foreach($_POST['pro_id'] as $key=>$pro_id){
        $project = $adminObj->getProjectById($pro_id);
        if($adminObj->ckProjectInGropu($pro_id,$project['ac_id'],$project['le_id'],"final")){
            // echo "มีแล้ว<br>";
            $data2['pro_id']=$pro_id;
            $data2['ac_id']=$project['ac_id'];
            $data2['le_id']=$project['le_id'];
            $data2['round']="final";
            $data2['score']=$_POST['score'][$pro_id];
            // print_r($data2);
            // echo "Update<br>";
            $ckupdate = $adminObj->updateGroup($data2);
        }else{
            // echo "ยังไม่มี<br>";
            $data['pro_id']=$pro_id;
            $data['ac_id']=$project['ac_id'];
            $data['le_id']=$project['le_id'];
            $data['round']="final";
            $data['score']=$_POST['score'][$pro_id];
            $data['year']=date("Y");
            // print_r($data);
            // echo "<br>";
            $ckadd = $adminObj->addGroup($data);
        }
    }
    echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/science/sciday/2023/pages/admin/final.php?msg=ok&ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}'} , 1);
        </script>
    ";
}


// ************************************* แจ้งเตือนเมื่อกดปุ่ม ลบ ****************************************************

if(isset($_GET['del'])){
    $project = $adminObj->getProjectById($_GET['pro_id']);
    echo "
        <script type='text/javascript'>
            let isExecuted = confirm('คุณแน่ใจว่าต้องการลบข้อมูลรายการนี้ ?');
            if (isExecuted == true) {
                location.href='/science/sciday/2023/pages/admin/save.php?ckdel=ok&pro_id={$_GET['pro_id']}&ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}&round={$_GET['round']}';
            } else {
                location.href='/science/sciday/2023/pages/admin/data.php?ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}';
            }
            console.log(isExecuted);
        </script>
    ";
}

// ************************************* กดปุ่ม ลบ แล้วยืนยัน OK ****************************************************

if(isset($_GET['ckdel']) AND $_GET['ckdel']== 'ok' ){
    // echo "del = OK";
    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
    $project = $adminObj->getProjectById($_GET['pro_id']);
    $ckdel = $adminObj->delGroup($_GET['pro_id'],$_GET['ac_id'],$_GET['le_id'],$_GET['round']);
    if($ckdel){
        if($_GET['round']=="final"){
            echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/pages/admin/final.php?msg=delok&ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}'} , 1);
            </script>
        ";
        }else{
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/admin/data.php?msg=delok&ac_id={$project['ac_id']}&le_id={$project['le_id']}&name={$project['level']}'} , 1);
                </script>
            ";
        }
    }

}
?>