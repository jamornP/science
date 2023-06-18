<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php 
    if(isset($_POST['edit'])){

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        if($_POST['ac_id']==4){
            // echo "answer";
            $data['pro_id']=$_POST['pro_id'];
            $data['le_id']=$_POST['le_id'];
            $data['school']=$_POST['school'];
            $data['tel']=$_POST['tel'];
            $data['date_update']=date("Y-m-d H:i:s");
            if($_FILES['file_register']['error']==0) {
                $ext = end(explode(".",$_FILES['file_register']['name']));
                if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
                    $new_name = "{$_POST['ac_id']}-project-".uniqid().".".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name;
                    move_uploaded_file($_FILES['file_register']['tmp_name'],$file_path);
                    $data['file_register']=$new_name;
                    // echo "file_register=>".$new_name."<br>";
                }
            }else{
                $data['file_register']=$_POST['file_name'];
            }
            $ckPro = $adminObj->updateProjectAnswerById($data);
            foreach($_POST['sti_id'] as $key => $st){
                $stdata['id']=$_POST['sid'][$key];
                $stdata['ti_id']=$_POST['sti_id'][$key];
                $stdata['stu_name']=$_POST['sname'][$key];
                $stdata['stu_surname']=$_POST['ssurname'][$key];
                $stdata['stu_email']=$_POST['semail'][$key];
                $stdata['school']=$_POST['school'];
                $stck = $adminObj->updateStudent($stdata);
                // print_r($stdata);
            }
            foreach($_POST['tti_id'] as $key => $tt){
                $tedata['id']=$_POST['tid'][$key];
                $tedata['ti_id']=$_POST['tti_id'][$key];
                $tedata['tea_name']=$_POST['tname'][$key];
                $tedata['tea_surname']=$_POST['tsurname'][$key];
                $tedata['tea_email']=$_POST['temail'][$key];
                $tedata['school']=$_POST['school'];
                $teck = $adminObj->updateTeacher($tedata);
            }
            if($ckPro AND $stck AND $teck){
                echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=ok'} , 0);
                    </script>
                ";
            }else{
                echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=error'} , 0);
                    </script>
                ";
            }
           

        }else{
            // echo "project";
            $data['pro_id']=$_POST['pro_id'];
            $data['p_name']=$_POST['p_name'];
            $data['le_id']=$_POST['le_id'];
            $data['school']=$_POST['school'];
            $data['tel']=$_POST['tel'];
            $data['link_video']=$_POST['link_video'];
            $data['date_update']=date("Y-m-d H:i:s");
            if($_FILES['file_register']['error']==0) {
                $ext = end(explode(".",$_FILES['file_register']['name']));
                if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
                    $new_name = "{$_POST['ac_id']}-project-".uniqid().".".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name;
                    move_uploaded_file($_FILES['file_register']['tmp_name'],$file_path);
                    $data['file_register']=$new_name;
                    // echo "file_register=>".$new_name."<br>";
                }
            }else{
                $data['file_register']=$_POST['file_name'];
            }
            if(isset($_POST['img_path']) AND count($_POST['img_path'])>0){
                // echo "มีรูป";
                $img_id = "i-".uniqid();
                $data['img_id']= $img_id;
                foreach ($_POST['img_path'] as $key => $imgs) {
                    
                    $img['img_id']=$img_id;
                    $img['path']=$_POST['img_path'][$key];
                    $img['pro_id']=$_POST['pro_id'];
                    $imgck = $adminObj->addImages($img);
                }
            }else{
                // echo "ไม่มีรูป";
                $data['img_id'] = $_POST['img_id'];
            }

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $ckPro = $adminObj->updateProjectById($data);
            foreach($_POST['sti_id'] as $key => $st){
                $stdata['id']=$_POST['sid'][$key];
                $stdata['ti_id']=$_POST['sti_id'][$key];
                $stdata['stu_name']=$_POST['sname'][$key];
                $stdata['stu_surname']=$_POST['ssurname'][$key];
                $stdata['stu_email']=$_POST['semail'][$key];
                $stdata['school']=$_POST['school'];
                $stck = $adminObj->updateStudent($stdata);
                // print_r($stdata);
            }
            foreach($_POST['tti_id'] as $key => $tt){
                $tedata['id']=$_POST['tid'][$key];
                $tedata['ti_id']=$_POST['tti_id'][$key];
                $tedata['tea_name']=$_POST['tname'][$key];
                $tedata['tea_surname']=$_POST['tsurname'][$key];
                $tedata['tea_email']=$_POST['temail'][$key];
                $tedata['school']=$_POST['school'];
                $teck = $adminObj->updateTeacher($tedata);
            }
            if($ckPro AND $stck AND $teck){
                echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/pages/member/index.php?msg=ok'} , 0);
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
    <div class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-173">แก้ไขข้อมูล</h5>
            <form action="" method="post" enctype="multipart/form-data" id="from-post">
                <div class="card-body">
            
                    <?php
                        $id=base64_decode($_GET['id']);
                        $data = $adminObj->getProjectByProjectUserId("data",$id,$_SESSION['user_id']);
                        // echo $_GET['ac_id'];
                        // echo $_SESSION['user_id'];
                        // print_r($data);
                        if(count($data)>0){
                            if($data['ac_id'] == 4){
                                ?>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="pro_id" name="pro_id" value="<?php echo $id;?>" required>
                                    <input type="hidden" class="form-control" id="ac_id" name="ac_id" value="<?php echo $data['ac_id'] ;?>" required>
                                    <input type="hidden" class="form-control" id="year" name="year" value="<?php echo $data['year'] ;?>" required>
                                    <label for="school" class="col-form-label">1. ชื่อสถาบันการศึกษา <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'</b>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                    <input type="text" class="form-control" id="school" name="school" value="<?php echo $data['school'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="le_id" class="col-form-label">2. ประเภท<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                    <br>
                                    <?php
                                    $levels = $adminObj->getLevelByActivity($data['ac_id']);
                                    foreach ($levels as $level) {
                                        $ck = ($data['le_id']== $level['le_id'] ? "checked":"");
                                        echo "
                                            <div class='form-check form-check-inline'>
                                                <input class='form-check-input' type='radio' name='le_id' id='{$level['le_id']}' value='{$level['le_id']}' required {$ck}>
                                                <label class='form-check-label' for='{$level['le_id']}'>{$level['name']}</label>
                                            </div>
                                        ";
                                    }
                                    ?>

                                </div>
                                <div class="mb-3">
                                    <label for="stu_id" class="col-form-label">3. ผู้เข้าประกวด<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                    <input type="hidden" class="form-control" id="stu_id" name="stu_id" value="<?php echo $data['stu_id']; ?>">
                                    <?php
                                        $students = $adminObj->getStudentById("data",$data['stu_id']);
                                        // echo "<pre>";
                                        // print_r($students);
                                        // echo "</pre>";
                                        foreach($students as $st){
                                            ?>
                                            <div class="d-flex flex-row bd-highlight mb-1">
                                                <div class="">
                                                    <select class="form-select" aria-label="Default select example" name="sti_id[]">
                                                        <?php
                                                        // $stSelect="";
                                                        $titles = $adminObj->getTitleByGroup(1);
                                                        foreach ($titles as $title) {
                                                            $stSelect = ($title['ti_id']==$st['ti_id'] ? "selected":"");
                                                            echo "
                                                                <option value='{$title['ti_id']}' {$stSelect}>{$title['name']}</option>
                                                            ";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="">
                                                    <input type="hidden" class="form-control" id="" placeholder="ชื่อ" name="sid[]" value="<?php echo $st['id'];?>">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]" value="<?php echo $st['stu_name'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="นามสกุล" name="ssurname[]" value="<?php echo $st['stu_surname'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="email" name="semail[]" value="<?php echo $st['stu_email'];?>">
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <label for="tea_id" class="col-form-label">4. อาจารย์ที่ปรึกษา<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                    <input type="hidden" class="form-control" id="tea_id" name="tea_id" value="<?php echo $data['tea_id']; ?>">
                                    <?php
                                        $teachers = $adminObj->getTeacherById("data",$data['tea_id']);
                                        // echo "<pre>";
                                        // print_r($teachers);
                                        // echo "</pre>";
                                        foreach($teachers as $te){
                                            ?>
                                            <div class="d-flex flex-row bd-highlight mb-1">
                                                <div class="">
                                                    <select class="form-select" aria-label="Default select example" name="tti_id[]">
                                                        <option selected>คำนำหน้าชื่อ</option>
                                                        <?php
                                                        $titles = $adminObj->getTitleByGroup(2);
                                                        foreach ($titles as $title) {
                                                            $teSelect = ($title['ti_id']==$te['ti_id'] ? "selected":"");
                                                            echo "
                                                            <option value='{$title['ti_id']}' {$teSelect}>{$title['name']}</option>
                                                        ";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="">
                                                    <input type="hidden" class="form-control" id="" placeholder="ชื่อ" name="tid[]" value="<?php echo $te['id'];?>">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]" value="<?php echo $te['tea_name'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="นามสกุล" name="tsurname[]" value="<?php echo $te['tea_surname'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="email" name="temail[]" value="<?php echo $te['tea_email'];?>">
                                                </div>
                                                
                                            </div>
                                            <?php
                                        }
                                    ?>
                                        
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="col-form-label">5. เบอร์โทรติดต่อผู้กรอกข้อมูล<font color="red">*</font>:</label>
                                    <input type="text" class="form-control" id="tel" name="tel" required value="<?php echo $data['tel'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="file_register" class="col-form-label">6. Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4 เป็นไฟล์ PDF เท่านั้น<font color="red">(ถ้าต้องการเปลี่ยนไฟล์ใหม่ให้ทำการ Upload file ใหม่)</font>:</label>
                                    <input type="hidden" class="form-control" id="file" name="file_name" required value="<?php echo $data['file_register'];?>">
                                    <input class="form-control" type="file" id="file_register" name="file_register" accept=".pdf" >
                                </div>
                                <?php
                            }else{
                                // print_r($data);
                                ?>
                            <!--  -->                       
                           
                            <div class="mb-3">
                                <input type="hidden" class="form-control" id="pro_id" name="pro_id" value="<?php echo $id;?>" required>
                                <input type="hidden" class="form-control" id="ac_id" name="ac_id" value="<?php echo $data['ac_id'] ;?>" required>
                                <input type="hidden" class="form-control" id="year" name="year" value="<?php echo $data['year'] ;?>" required>
                                <label for="p_name" class="col-form-label">1. ชื่อผลงาน <font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="text" class="form-control" id="p_name" name="p_name" required value="<?php echo $data['p_name'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="le_id" class="col-form-label">2. ระดับ<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <br>
                                <?php
                                $levels = $adminObj->getLevelByActivity($data['ac_id']);
                                foreach ($levels as $level) {
                                    $ck = ($data['le_id']== $level['le_id'] ? "checked":"");
                                    echo "
                                        <div class='form-check form-check-inline'>
                                            <input class='form-check-input' type='radio' name='le_id' id='{$level['le_id']}' value='{$level['le_id']}' required {$ck}>
                                            <label class='form-check-label' for='{$level['le_id']}'>{$level['name']}</label>
                                        </div>
                                    ";
                                }
                                ?>

                            </div>
                            <div class="mb-3">
                                <label for="school" class="col-form-label">3. ชื่อสถาบันการศึกษา <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......' </b>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="text" class="form-control" id="school" name="school" value="<?php echo $data['school'];?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="stu_id" class="col-form-label">4. ผู้เข้าประกวด<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="hidden" class="form-control" id="stu_id" name="stu_id" value="<?php echo "s-" . uniqid(); ?>">
                                <?php
                                        $students = $adminObj->getStudentById("data",$data['stu_id']);
                                        // echo "<pre>";
                                        // print_r($students);
                                        // echo "</pre>";
                                        foreach($students as $st){
                                            ?>
                                            <div class="d-flex flex-row bd-highlight mb-1">
                                                <div class="">
                                                    <select class="form-select" aria-label="Default select example" name="sti_id[]">
                                                        <?php
                                                        // $stSelect="";
                                                        $titles = $adminObj->getTitleByGroup(1);
                                                        foreach ($titles as $title) {
                                                            $stSelect = ($title['ti_id']==$st['ti_id'] ? "selected":"");
                                                            echo "
                                                                <option value='{$title['ti_id']}' {$stSelect}>{$title['name']}</option>
                                                            ";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="">
                                                    <input type="hidden" class="form-control" id="" placeholder="ชื่อ" name="sid[]" value="<?php echo $st['id'];?>">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]" value="<?php echo $st['stu_name'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="นามสกุล" name="ssurname[]" value="<?php echo $st['stu_surname'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="email" name="semail[]" value="<?php echo $st['stu_email'];?>">
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                            </div>
                            <div class="mb-3">
                                <label for="tea_id" class="col-form-label">5. อาจารย์ที่ปรึกษา<font color="red">*</font>: <font color="red"> (มีผลต่อการออกใบประกาศนียบัตร)</font></label>
                                <input type="hidden" class="form-control" id="tea_id" name="tea_id" value="<?php echo "t-" . uniqid(); ?>">
                                <?php
                                        $teachers = $adminObj->getTeacherById("data",$data['tea_id']);
                                        // echo "<pre>";
                                        // print_r($teachers);
                                        // echo "</pre>";
                                        foreach($teachers as $te){
                                            ?>
                                            <div class="d-flex flex-row bd-highlight mb-1">
                                                <div class="">
                                                    <select class="form-select" aria-label="Default select example" name="tti_id[]">
                                                        <option selected>คำนำหน้าชื่อ</option>
                                                        <?php
                                                        $titles = $adminObj->getTitleByGroup(2);
                                                        foreach ($titles as $title) {
                                                            $teSelect = ($title['ti_id']==$te['ti_id'] ? "selected":"");
                                                            echo "
                                                            <option value='{$title['ti_id']}' {$teSelect}>{$title['name']}</option>
                                                        ";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="">
                                                <input type="hidden" class="form-control" id="" placeholder="ชื่อ" name="tid[]" value="<?php echo $te['id'];?>">
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]" value="<?php echo $te['tea_name'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="นามสกุล" name="tsurname[]" value="<?php echo $te['tea_surname'];?>">
                                                </div>
                                                <div class="">
                                                    <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="email" name="temail[]" value="<?php echo $te['tea_email'];?>">
                                                </div>
                                                
                                            </div>
                                            <?php
                                        }
                                    ?>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="col-form-label">6. เบอร์โทรติดต่อผู้กรอกข้อมูล<font color="red">*</font>:</label>
                                <input type="text" class="form-control" id="tel" name="tel" required value="<?php echo $data['tel'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="file_register" class="col-form-label">7. Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4 เป็นไฟล์ PDF เท่านั้น<font color="red">*</font>:</label>
                                <input type="hidden" class="form-control" id="file" name="file_name" required value="<?php echo $data['file_register'];?>">
                                <input class="form-control" type="file" id="file_register" name="file_register" accept=".pdf" >
                            </div>
                            <div class="mb-3">
                                <label for="link_video" class="col-form-label">8. Link ดู video ผลงานบน Youtube <font color="red">*</font></b>:</label>
                                <input class="form-control" type="text" id="link_video" name="link_video" required value="<?php echo $data['link_video'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="img_id" class="col-form-label"> 9. Upload ไฟล์รูปภาพ รูปชิ้นงาน หรือรูปแสดงการสร้างชิ้นงาน<font color="red">( *.png หรือ *.jpg )</font> เท่านั้นไม่เกิน 5 รูป</b>:</label>
                                <input type="hidden" class="form-control" id="img_id" name="img_id" value="<?php echo $data['img_id']; ?>" required>
                                <div class="container">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dropzone" id="drop"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php

                            }
                        }
                    ?>
                    
                </div>
                <div class="modal-footer">
                    <a href="/science/sciday/2023/pages/member" class="btn btn-danger text-white">ย้อนกลับ</a>
                    <button type="submit" class="btn btn-primary" name="edit">แก้ไข</button>
                </div>
            </form>
        </div>


    </div>
<br>
<br>
<br>
<br>
<br>
<script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#drop", {
            url: "/science/sciday/project/uploader.php",
            addRemoveLinks: true,
            // autoProcessQueue: false,
            dictDefaultMessage: "วางไฟล์ที่นี้",
            dictCancelUpload: "<i class='material-icons'>cancel</i>",
            dictRemoveFile: "<i class='material-icons'>cancel</i>"

        });

        myDropzone.on("success", function(file) {
            console.log(file.xhr.response)
            let res = JSON.parse(file.xhr.response)
            console.log(res)
            file.previewElement.appendChild(
                Dropzone.createElement(`<input type="hidden" name="img_path[]" value="${res.img_path}">`)
            )
        })
    </script>
    <script>
        function readURL(input) {
            if (input.files[1]) {
                let reader = new FileReader();
                document.querySelector('#imgControl').classList.replace("d-none", "d-block");
                reader.onload = function(e) {
                    let element = document.querySelector('#imgUpload');
                    element.setAttribute("src", e.target.result);
                }
                reader.readAsDataURL(input.files[1]);

            }
        }
    </script>
</body>

</html>