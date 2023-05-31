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

<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php $ac_id = base64_decode($_GET['id']);
    ?>
    <div class="container mt-5">
        <?php 
            if(isset($_POST['edit_fileRegis'])){
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
                // echo "<pre>";
                // print_r($_FILES);
                // echo "</pre>";
                $data['ac_id'] = $ac_id;
                $data['doc_spec'] = $_POST['doc_spec'];
                $data['doc_regis_pdf'] = $_POST['doc_regis_pdf'];
                $data['doc_regis_word'] = $_POST['doc_regis_word'];
               
                if($_FILES['file_spec']['tmp_name']!=""){
                    $ext = end(explode(".",$_FILES['file_spec']['name']));
                    $new_name = "spec-{$ac_id}-2023.".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name;
                    move_uploaded_file($_FILES['file_spec']['tmp_name'],$file_path);
                    $data['doc_spec'] = $new_name;
                }else{
                    $data['doc_spec'] = $_POST['doc_spec'];
                }
                if($_FILES['file_pdf']['tmp_name']!=""){
                    $ext = end(explode(".",$_FILES['file_pdf']['name']));
                    $new_name2 = "pdf-{$ac_id}-2023.".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name2;
                    move_uploaded_file($_FILES['file_pdf']['tmp_name'],$file_path);
                    $data['doc_regis_pdf'] = $new_name2;
                }else{
                    $data['doc_regis_pdf'] = $_POST['doc_regis_pdf'];
                }
                if($_FILES['file_word']['tmp_name']!=""){
                    $ext = end(explode(".",$_FILES['file_word']['name']));
                    $new_name3 = "word-{$ac_id}-2023.".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file2023/".$new_name3;
                    move_uploaded_file($_FILES['file_word']['tmp_name'],$file_path);
                    $data['doc_regis_word'] = $new_name3;
                }else{
                    $data['doc_regis_word'] = $_POST['doc_regis_word'];
                }
               
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                $ckUpdate = $adminObj->updateDocument($data);
                if($ckUpdate){
                    echo "  
                        <script type='text/javascript'>
                            setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1000);
                        </script>
                    ";
                }
            }
        ?>
        <div class="card">
            <h5 class="card-header bg-60">จัดการไฟล์ที่เกี่ยวข้องกับการรับสมัคร</h5>
            <div class="card-body">
                <?php
                    $activity = $adminObj->getDocumentById($ac_id);
                    // print_r($activity);
                ?>
                <?php //echo base64_decode($_GET['id']);?>
                <form action="" method="post" enctype="multipart/form-data" id="from-post">
                    <div class="mb-3">
                        <label for="name" class="form-label">กิจกรรม :</label> 
                        <input type="text" class="form-control" id="name" placeholder="" value="<?php echo $activity['name'];?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="doc_spec" class="form-label">ไฟล์หลักเกณฑ์การประกวด เก่า :</label>
                        <input type="text" class="form-control" id="doc_spec" placeholder="" value="<?php echo $activity['doc_spec'];?>" name="doc_spec" >
                    </div>
                    <div class="mb-3">
                        <label for="file_spec" class="form-label">Upload ไฟล์หลักเกณฑ์การประกวด (*.pdf) :</label>
                        <input class="form-control" type="file" id="file_spec" name="file_spec" accept=".pdf">
                    </div>
                    <div class="mb-3">
                        <label for="doc_regis_pdf" class="form-label">ไฟล์ใบสมัคร PDF เก่า :</label>
                        <input type="text" class="form-control" id="doc_regis_pdf" placeholder="" value="<?php echo $activity['doc_regis_pdf'];?>" name="doc_regis_pdf" >
                    </div>
                    <div class="mb-3">
                        <label for="file_pdf" class="form-label">Upload ไฟล์ใบสมัคร PDF (*.pdf) :</label>
                        <input class="form-control" type="file" id="file_pdf" name="file_pdf" accept=".pdf">
                    </div>
                    <div class="mb-3">
                        <label for="doc_regis_word" class="form-label">ไฟล์ใบสมัคร Word เก่า :</label>
                        <input type="text" class="form-control" id="doc_regis_word" placeholder="" value="<?php echo $activity['doc_regis_word'];?>" name="doc_regis_word" >
                    </div>
                    <div class="mb-3">
                        <label for="file_word" class="form-label">Upload ไฟล์ใบสมัคร Word (*.doc, *.docx) :</label>
                        <input class="form-control" type="file" id="file_word" name="file_word" accept=".doc, .docx">
                    </div>
                    
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_fileRegis">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>

</body>

</html>