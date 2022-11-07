<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));

use App\Model\Pr\User;
$userObj = new User;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองรถ</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/pr/components/link.php";?>
    
</head>

<body class="font-sriracha">
<?php 
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/science/pr/components/navbar.php"; 
?>
<div class="container-fluid mt-5">
<?php   
$data =$userObj->getUserById($_SESSION['id']);
?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>แก้ไข</h4>
            </div>
            <div class="card-body">
                <form action="saveEdit.php" class="" method="POST">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="name" class="form-label">ชื่อ</label>
                                <input type="text" id="name" class="form-control" name="name" autofocus required value="<?php echo $data['name'];?>">
                                <input type="hidden" id="id" class="form-control" name="staff_id"  value="<?php echo $_SESSION['id'];?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="surname"class="form-label">นามสกุล</label>
                                <input type="text" id="surname" class="form-control" name="surname" required  value="<?php echo $data['surname'];?>">
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <label for="exampleColorInput" class="form-label">เลือกสี</label>
                            <input type="color" class="form-control form-control-color" id="exampleColorInput" value="<?php echo $data['color']; ?>" title="Choose your color" name="color">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary mt-3">แก้ไข</button>
                    </div>
                </form>
                
            </div>
	    </div>
    </div>
</div>
</body>
</html>