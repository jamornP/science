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
    <?php //print_r($_SESSION);
    if(isset($_POST['edit_home'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        $data['youtube']=$_POST['youtube'];
        $data['id']=$_POST['id'];
        if($_FILES['file_head']['error']!=4){
            $ext = end(explode(".",$_FILES['file_head']['name']));
            $new_name = "header-2023.".$ext;
            $file_path = $_SERVER['DOCUMENT_ROOT']."/science/sciday/images/".$new_name;
            move_uploaded_file($_FILES['file_head']['tmp_name'],$file_path);
            $data['img_head'] = $new_name;
        }else{
            $data['img_head']=$_POST['img_head'];
        }
        if($_FILES['file_poster']['error']!=4){
            $ext = end(explode(".",$_FILES['file_poster']['name']));
            $new_name2 = "poster-2023.".$ext;
            $file_path = $_SERVER['DOCUMENT_ROOT']."/science/sciday/images/".$new_name2;
            move_uploaded_file($_FILES['file_poster']['tmp_name'],$file_path);
            $data['img_poster']=$new_name2;
        }else{
            $data['img_poster']=$_POST['img_poster'];
        }
        // print_r($data);
        $ck = $adminObj->updateIndex($data);
        if($ck){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/science/sciday/2023/backend/index.php?msg=ok'} , 1000);
                </script>
            ";
        }
    }
    ?>
    <div class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-170">หน้าหลัก</h5>
            <div class="card-body">
                <?php
                    $home = $adminObj->getIndexฺById($_GET['id']);
                ?>
                <form action="" method="post" enctype="multipart/form-data" id="from-post">
                    
                    <div class="mb-3">
                        <label for="img_head" class="form-label">header เก่า :</label>
                        <img src="/science/sciday/images/<?php echo $home['img_head'];?>" class="img-thumbnail" alt="...">
                        <input type="hidden" class="form-control" id="img_head" placeholder="" value="<?php echo $home['img_head'];?>" name="img_head" >
                        <input type="hidden" class="form-control" id="id" placeholder="" value="<?php echo $_GET['id'];?>" name="id" >
                    </div>
                    <div class="mb-3">
                        <label for="file_head" class="form-label">Upload file header :</label>
                        <input class="form-control" type="file" id="file_head" name="file_head" accept=".png, .jpg">
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">Video เก่า :</label>
                        <br>
                        <?php echo $home['youtube'];?>
                        <textarea rows="3" class="form-control" id="youtube" name="youtube" ><?php echo $home['youtube'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img_poster" class="form-label">ไฟล์ Poster เก่า :</label><br>
                        <img src="/science/sciday/images/<?php echo $home['img_poster'];?>" class="img-thumbnail" alt="..." width="200">
                        <input type="hidden" class="form-control" id="img_poster" rows="3" placeholder="" value="<?php echo $home['img_poster'];?>" name="img_poster" >
                    </div>
                    <div class="mb-3">
                        <label for="file_poster" class="form-label">Upload ไฟล์ Poster :</label>
                        <input class="form-control" type="file" id="file_poster" name="file_poster" accept=".png, .jpg">
                    </div>
                    
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary" name="edit_home">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>


    </div>


</body>

</html>