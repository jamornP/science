<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php

use App\Model\Car\Department;

if($_REQUEST['action']=='edit'){
    $departmentObj = new Department;
    $department = $departmentObj->getDepartmentById($_REQUEST['id']);
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
    <div class="">
        <?php require $_SERVER['DOCUMENT_ROOT']."/science/car/components/navbar.php";?>

    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5>แบบฟอร์ม<?php echo ($_REQUEST['action']=='edit') ? " แก้ไขข้อมูลสังกัด" : " เพิ่มข้อมูลสังกัด";?></h5>
                        <!-- <a href="index.php" class="btn btn-primary">ย้อนกลับ</a> -->
                    </div>
                        <div class="card-body">
                            <form action="save.php" method="get">
                                <!-- <p class="mt-3"><b>ชนิดรถ</b></p>
                                <hr> -->
                                <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit') ? "edit" : "add";?>">
                                <input type="hidden" name="id" value="<?php echo $department['id']; ?>">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label">ชื่อสังกัด</label>
                                            <input type="text" id="name" class="form-control" name="name" autofocus required value="<?php echo $department['name']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                                    <button class="btn btn-success text-white" type="submit">บันทึก</button>
                                    <a href="/science/car/pages/department/" class="btn btn-warning text-white">ย้อนกลับ</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        $(function(){
            $("#datepicker").datepicker({
                language:'th-en',
                format: 'yyyy/mm/dd',
                autoclose: true
            });
            $("#datepicker2").datepicker({
                language:'th-en',
                format:'yyyy/mm/dd',
                autoclose: true
            });
        });
    </script>
</body>
</html>