<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php"; ?>
<?php
    use App\Model\Sciday2023\Auth;
    $authObj = new Auth;
    use App\Model\Sciday2023\Admin;
    $adminObj = new Admin;
    date_default_timezone_set('Asia/Bangkok');
    if(isset($_POST['add_news'])){
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        $dataN['n_title'] = $_POST['n_title'];
        $dataN['n_detail'] = $_POST['n_detail'];
        $dataN['n_link'] = $_POST['n_link'];
        $dataN['n_show'] = 1;
        $dataN['n_date'] = date("Y-m-d H:i:s");
        $dataN['d_id'] = $_POST['d_id'];

        $n_id = $adminObj->addNews($dataN);
        if($n_id){
            
            $countF = count($_FILES['d_link']['tmp_name']);
            // echo $countF;
            if($countF>0) {
                if($_FILES['d_link']['error'][0] != "4"){
                    for($i=0;$i<$countF;$i++){
                        $ext = end(explode(".",$_FILES['d_link']['name'][$i]));
                        $new_name = "project-".uniqid().".".$ext;
                        $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name;
                        move_uploaded_file($_FILES['d_link']['tmp_name'][$i],$file_path);
                        $dataD['d_id'] = $_POST['d_id'];
                        $dataD['d_num'] = $i+1;
                        $dataD['d_link'] = "/science/upload/sciday/file2023/".$new_name;
                        $dataD['d_date'] = date("Y-m-d H:i:s");
                        $dataD['d_name'] = $_POST['d_name'][$i];
                        $id = $adminObj->addDownload($dataD);
                        if($id){
                            echo "  
                            <script type='text/javascript'>
                                setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1);
                            </script>
                        ";
                        }
                    }
                }else{
                    echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1);
                    </script>
                    ";
                }
            }
        }
        



    }
    // echo "<pre>";
    // print_r($dataN);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($dataD);
    // echo "</pre>";
    // ------------------------------------------------------------ ลบ ---------------------------------------------
    if(isset($_GET['del']) AND $_GET['del']=="del_news"){
        echo "del";
        $news = $adminObj->getNewsById($_GET['n_id']);
        echo "
            <script type='text/javascript'>
                let isExecuted = confirm('คุณแน่ใจว่าต้องการลบข้อมูลรายการนี้ ?');
                if (isExecuted == true) {
                    location.href='/science/sciday/2023/backend/save.php?ckdel=ok&n_id={$_GET['n_id']}';
                } else {
                    location.href='/science/sciday/2023/backend';
                }
                console.log(isExecuted);
            </script>
        ";
    }
    if(isset($_GET['ckdel']) AND $_GET['ckdel']=="ok"){
        $ckdel = $adminObj->delNews($_GET['n_id']);
        if($ckdel){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1);
                </script>
            ";
        }else{
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=error'} , 1);
                </script>
            ";
        }
        
    }
    if(isset($_POST['add_carousel'])){
        echo "Carousel";
        echo "<pre>";
        print_r($_FILES);
        echo"</pre>";
        $data['num']=1;
        $data['c_show']=1;
        $data['active']=0;
        $data['c_link']=$_POST['c_link'];
        if($_FILES['carousel']['error']!=4){
            $ext = end(explode(".",$_FILES['carousel']['name']));
            $new_name = "carousel-".uniqid().".".$ext;
            $file_path = $_SERVER['DOCUMENT_ROOT']."/science/sciday/images/".$new_name;
            move_uploaded_file($_FILES['carousel']['tmp_name'],$file_path);
            $data['img_path'] = $new_name;
            $ckcarosel = $adminObj->addCarousel($data);
            if($ckcarosel){
                echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1);
                </script>
                ";
            }else{
                echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=error'} , 1);
                    </script>
                ";
            }
            
        }else{
            echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=error'} , 1);
            </script>
        ";
        }
    }
    if(isset($_GET['del_ca']) AND $_GET['del_ca']== "ok"){
        $ckdel = $adminObj->delCarousel($_GET['c_id']);
        if($ckdel){
            echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1);
            </script>
            ";
        }else{
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=error'} , 1);
                </script>
            ";
        }
    }
?>