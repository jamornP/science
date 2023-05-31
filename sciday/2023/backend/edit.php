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
            if(isset($_POST['edit_activity'])){
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
                // echo "<pre>";
                // print_r($_FILES);
                // echo "</pre>";
                $data['ac_id'] = $ac_id;
                $data['name'] = $_POST['name'];
                $data['year'] = $_POST['year'];
                $data['link'] = $_POST['link'];
                $data['com_link'] = $_POST['com_link'];
                $data['admin_link'] = $_POST['admin_link'];
                $data['pages'] = $_POST['pages'];
                if($_FILES['file_images']['tmp_name']!=""){
                    $ext = end(explode(".",$_FILES['file_images']['name']));
                    $new_name = "i-{$ac_id}-2023.".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/sciday/images/".$new_name;
                    move_uploaded_file($_FILES['file_images']['tmp_name'],$file_path);
                    $data['images'] = $new_name;
                }else{
                    $data['images'] = $_POST['images'];
                }
                if($_FILES['file_schedule']['tmp_name']!=""){
                    $ext = end(explode(".",$_FILES['file_schedule']['name']));
                    $new_nameS = "s-{$ac_id}-2023.".$ext;
                    $file_path = $_SERVER['DOCUMENT_ROOT']."/science/sciday/images/".$new_nameS;
                    move_uploaded_file($_FILES['file_schedule']['tmp_name'],$file_path);
                    $data['schedule'] = $new_nameS;
                }else{
                    $data['schedule'] = $_POST['schedule'];
                }
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                $ckUpdate = $adminObj->updateActivityBySql($data);
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
            <h5 class="card-header bg-60">กิจกรรม</h5>
            <div class="card-body">
                <?php
                    $activity = $adminObj->getActivityById($ac_id);
                    // print_r($activity);
                ?>
                <?php //echo base64_decode($_GET['id']);?>
                <form action="" method="post" enctype="multipart/form-data" id="from-post">
                    <div class="mb-3">
                        <label for="name" class="form-label">name :</label> 
                        <input type="text" class="form-control" id="name" placeholder="" value="<?php echo $activity['name'];?>" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">year :</label>
                        <input type="text" class="form-control" id="year" placeholder="" value="<?php echo $activity['year'];?>" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">link :</label>
                        <input type="text" class="form-control" id="link" placeholder="" value="<?php echo $activity['link'];?>" name="link" required>
                    </div>
                    <div class="mb-3">
                        <label for="com_link" class="form-label">com_link :</label>
                        <input type="text" class="form-control" id="com_link" placeholder="" value="<?php echo $activity['com_link'];?>" name="com_link" required>
                    </div>
                    <div class="mb-3">
                        <label for="admin_link" class="form-label">admin_link :</label>
                        <input type="text" class="form-control" id="admin_link" placeholder="" value="<?php echo $activity['admin_link'];?>" name="admin_link" required>
                    </div>
                    <div class="mb-3">
                        <label for="pages" class="form-label">pages :</label>
                        <input type="text" class="form-control" id="pages" placeholder="" value="<?php echo $activity['pages'];?>" name="pages" required>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">image old :</label><br>
                        <img src="<?php echo "/science/sciday/images/".$activity['images'];?>" class="img-thumbnail" alt="..." width="100" height="80" >
                        <input type="hidden" class="form-control" id="images" placeholder="" value="<?php echo $activity['images'];?>" name="images" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="formFileimages" class="form-label">Upload รูปภาพใหม่ :</label>
                        <input class="form-control" type="file" id="formFileimages" name="file_images">
                    </div>
                    <div class="mb-3">
                        <label for="schedule" class="form-label">กำหนดการ old :</label><br>
                        <img src="<?php echo "/science/sciday/images/".$activity['schedule'];?>" class="img-thumbnail" alt="..." width="100" height="80" >
                        <input type="hidden" class="form-control" id="schedule" placeholder="" value="<?php echo $activity['schedule'];?>" name="schedule" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="formFileschedule" class="form-label">Upload รูปกำหนดการใหม่ :</label>
                        <input class="form-control" type="file" id="formFileschedule" name="file_schedule">
                    </div>
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_activity">Update</button>
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