
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));

use App\Model\Car\Position;
use App\Model\Car\Department;
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
<body class="font-kanit vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>สมัครใช้งาน</h4>
            </div>
            <div class="card-body">
                <form action="saveRegister.php" class="" method="POST">
                    <div class="row">
                        <?php
                            if($_GET['msg']) {
                                echo "<h5 class='my-3 text-danger text-center'>Email ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
                            }
                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="name" class="form-label">ชื่อ</label>
                                <input type="text" id="name" class="form-control" name="name" autofocus required >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="surname"class="form-label">นามสกุล</label>
                                <input type="text" id="surname" class="form-control" name="surname" required >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="email" class="form-label">Email <b class="text-danger">สถาบัน ใส่ @kmitl.ac.th ด้วย</b></label>
                                <input type="email" id="email" class="form-control" name="email"  required >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="password"class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <label for="exampleColorInput" class="form-label">เลือกสี</label>
                            <input type="color" class="form-control form-control-color" id="exampleColorInput" value="<?php echo $status['color']; ?>" title="Choose your color" name="color">
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary mt-3">ลงทะเบียน</button>
                    </div>
                </form>
                <a href="login.php">เข้าสู่ระบบ</a>
            </div>
	    </div>
    </div>
</body>
</html>