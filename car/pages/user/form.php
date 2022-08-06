<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));

use App\Model\Car\Position;
use App\Model\Car\Department;

use App\Model\Car\User;

if($_REQUEST['action']=='edit'){
    $userObj = new User;
    $user = $userObj->getUserById($_REQUEST['id']);
    // print_r($user);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองรถ</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/car/components/link.php";?>
</head>
<body class="font-kanit">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/components/navbar.php";?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-warning text-white">
                <h4>แก้ไขข้อมูลสมาชิก</h4>
            </div>
            <div class="card-body">
                <form action="save.php" class="" method="post">
                    <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit') ? "edit" : "add";?>">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="name" class="form-label">ชื่อ</label>
                                <input type="text" id="name" class="form-control" name="name" autofocus required value="<?php echo $user['name']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="surname"class="form-label">นามสกุล</label>
                                <input type="text" id="surname" class="form-control" name="surname" required value="<?php echo $user['surname']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="position"class="form-label">ตำแหน่ง</label>
                                <select class="form-select" aria-label="Default select example" id="position" name="position" required>
                                    <option  value="">เลือก</option>
                                    <?php
                                        $positionObj = new Position;
                                        $positions = $positionObj->getAllPosition(); 
                                        foreach($positions as $position) {
                                            $selected =($position['id']==$user['p_id']) ? 
                                            "selected" : "";
                                            echo "
                                            <option value='{$position['id']}' {$selected} >{$position['name']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="tel"class="form-label">เบอร์โทร</label>
                                <input type="text" id="tel" class="form-control" name="tel" required value="<?php echo $user['tel']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="department"class="form-label">สังกัด</label>
                                <select class="form-select" aria-label="Default select example" id="department" name="department" required>
                                    <option value="">เลือก</option>
                                    <?php
                                        $departmentObj = new Department;
                                        $departments = $departmentObj->getAlldepartment(); 
                                        foreach($departments as $department) {
                                            $selected =($department['id']==$user['d_id']) ? 
                                            "selected" : "";
                                            echo "
                                            <option value='{$department['id']}' {$selected} >{$department['name']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        if($_REQUEST['role']=='admin'){
                            echo "
                                <div class='col-sm-12 col-md-6 col-lg-3'>
                                    <div class='form-group'>
                                        <label for='department'class='form-label'>status</label>
                                        <select class='form-select' aria-label='Default select example' id='department' name='role' required>
                                            <option value='{$user['role']}'>{$user['role']}</option>
                                            <option value='member'>member</option>
                                            <option value='moderator'>moderator</option>
                                            <option value='admin'>admin</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary mt-3">บันทึก</button>
                    </div>
                </form>
                
            </div>
	    </div>
    </div>
    <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js'></script> -->
</body>
</html>