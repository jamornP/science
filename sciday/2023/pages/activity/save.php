<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php"; ?>
<?php
session_start();
    use App\Model\Sciday2023\Auth;
    $authObj = new Auth;
    use App\Model\Sciday2023\Admin;
    $adminObj = new Admin;
    date_default_timezone_set('Asia/Bangkok');
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    if($_POST['pages']=="artifact" OR $_POST['pages']=="project" OR $_POST['pages']=="iot" OR $_POST['pages']=="microbit"){
        $data['p_name']=$_POST['p_name'];
        $data['le_id']=$_POST['le_id'];
        $data['school']=$_POST['school'];
        $data['stu_id']=$_POST['stu_id'];
        $data['tea_id']=$_POST['tea_id'];
        if(isset($_FILES['file_register']['tmp_name'])) {
            $ext = end(explode(".",$_FILES['file_register']['name']));
            if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
                $new_name = "{$_POST['ac_id']}-project-".uniqid().".".$ext;
                $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name;
                move_uploaded_file($_FILES['file_register']['tmp_name'],$file_path);
                $data['file_register']=$new_name;
                // echo "file_register=>".$new_name."<br>";
            }else{
                echo "รูปแบบไฟล์ใบสมัครไม่ถูกต้อง";
                echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/pages/activity/project.php?pages={$_POST['pages']}&msg=error'} , 1000);
                    </script>
                ";
                exit();
            }
        }else{
            echo "No file";
        }
        $data['img_id']=$_POST['img_id'];
        $data['year']=date("Y");
        $data['date_at']=date("Y-m-d H:i:s");
        $data['ac_id']=$_POST['ac_id'];
        $data['tel']=$_POST['tel'];
        $data['link_video']=$_POST['link_video'];
        $data['u_id']=$_SESSION['user_id'];//$_SESSION['user_id'];

        $pro_id = $adminObj->addProject($data);
        

        // add data เข้า tb_project ก่อนค่อย แอด tb_studen ,tb_teacher, tb_images
        foreach($_POST['sti_id'] as $key => $st){
            $stdata['stu_id']=$_POST['stu_id'];
            $stdata['ti_id']=$_POST['sti_id'][$key];
            $stdata['stu_name']=$_POST['sname'][$key];
            $stdata['stu_surname']=$_POST['ssurname'][$key];
            $stdata['pro_id']=$pro_id;
            $stdata['school']=$_POST['school'];
            $stdata['ac_id']=$_POST['ac_id'];
            $stdata['stu_email']=$_POST['semail'][$key];
            $stck = $adminObj->addStuden($stdata);
            // echo "<pre>";
            // print_r($stdata);
            // echo "</pre>";
        }
        foreach($_POST['tti_id'] as $key => $tt){
            $tedata['tea_id']=$_POST['tea_id'];
            $tedata['ti_id']=$_POST['tti_id'][$key];
            $tedata['tea_name']=$_POST['tname'][$key];
            $tedata['tea_surname']=$_POST['tsurname'][$key];
            $tedata['pro_id']=$pro_id;
            $tedata['school']=$_POST['school'];
            $tedata['ac_id']=$_POST['ac_id'];
            $tedata['tea_email']=$_POST['temail'][$key];
            $teck = $adminObj->addTeacher($tedata);
            // echo "<pre>";
            // print_r($tedata);
            // echo "</pre>";
        }
        if(isset($_POST['img_path'])){
            foreach ($_POST['img_path'] as $key => $imgs) {
                $img['img_id']=$_POST['img_id'];
                $img['path']=$_POST['img_path'][$key];
                $img['pro_id']=$pro_id;
                $imgck = $adminObj->addImages($img);
            }
        }else{
                $img['img_id']=$_POST['img_id'];
                $img['path']="/science/upload/sciday/images/no_img.jpg";
                $img['pro_id']=$pro_id;
                $imgck = $adminObj->addImages($img);
        }
        
        if($pro_id and $stck and $teck and $imgck){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=ok'} , 1);
                </script>
            ";
        }else{
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/activity/project.php?msg=error'} , 1);
                </script>
            ";
        }
    }elseif($_POST['pages']=="answer-TH" OR $_POST['pages']=="answer-EN"){
        // $data['p_name']=$_POST['p_name'];
        $data['le_id']=$_POST['le_id'];
        $data['school']=$_POST['school'];
        $data['stu_id']=$_POST['stu_id'];
        $data['tea_id']=$_POST['tea_id'];
        if(isset($_FILES['file_register']['tmp_name'])) {
            $ext = end(explode(".",$_FILES['file_register']['name']));
            if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
                $new_name = "{$_POST['ac_id']}-project-".uniqid().".".$ext;
                $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name;
                move_uploaded_file($_FILES['file_register']['tmp_name'],$file_path);
                $data['file_register']=$new_name;
                // echo "file_register=>".$new_name."<br>";
            }else{
                echo "รูปแบบไฟล์ใบสมัครไม่ถูกต้อง";
                echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/activity/project.php?pages={$_POST['pages']}&msg=error'} , 1);
                </script>
                ";
            }
        }else{
            echo "No file";
        }
        // $data['img_id']=$_POST['img_id'];
        $data['year']=date("Y");
        $data['date_at']=date("Y-m-d H:i:s");
        $data['ac_id']=$_POST['ac_id'];
        $data['tel']=$_POST['tel'];
        // $data['link_video']=$_POST['link_video'];
        $data['u_id']=$_SESSION['user_id'];//$_SESSION['user_id'];
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $pro_id = $adminObj->addProjectAnswer($data);
        foreach($_POST['sti_id'] as $key => $st){
            $stdata['stu_id']=$_POST['stu_id'];
            $stdata['ti_id']=$_POST['sti_id'][$key];
            $stdata['stu_name']=$_POST['sname'][$key];
            $stdata['stu_surname']=$_POST['ssurname'][$key];
            $stdata['pro_id']=$pro_id;
            $stdata['school']=$_POST['school'];
            $stdata['ac_id']=$_POST['ac_id'];
            $stdata['stu_email']=$_POST['semail'][$key];
            // echo "<pre>";
            // print_r($stdata);
            // echo "</pre>";
            $stck = $adminObj->addStuden($stdata);
        
        }
        foreach($_POST['tti_id'] as $key => $tt){
            $tedata['tea_id']=$_POST['tea_id'];
            $tedata['ti_id']=$_POST['tti_id'][$key];
            $tedata['tea_name']=$_POST['tname'][$key];
            $tedata['tea_surname']=$_POST['tsurname'][$key];
            $tedata['pro_id']=$pro_id;
            $tedata['school']=$_POST['school'];
            $tedata['ac_id']=$_POST['ac_id'];
            $tedata['tea_email']=$_POST['temail'][$key];
            // echo "<pre>";
            // print_r($tedata);
            // echo "</pre>";
            $teck = $adminObj->addTeacher($tedata);
        }
        $img="";
        if($pro_id and $stck and $teck){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=add_ok'} , 1);
                </script>
            ";
        }else{
            echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=add_error'} , 1);
            </script>
        ";
        }
    }
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($stdata);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($tedata);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($img);
    // echo "</pre>";
    
?>