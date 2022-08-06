<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Car\User;
if($_SESSION['role']!='admin'){
    header("location: /car/index.php");
    exit;
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
                        <h5>ข้อมูลสมาชิก</h5>
                        <!-- <a href="form.php" class="btn btn-warning text-white"><i class='bx bx-plus-medical' ></i> เพิ่มข้อมูล</a> -->
                    </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Email</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>สังกัด</th>
                                        <th>สถานะ</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $userObj = new User;
                                        $users = $userObj->getAllUser(); 
                                        $i=0;
                                        foreach($users as $user) {
                                            $name = $user['name']." ".$user['surname'];
                                            $i++;
                                            echo "
                                                <tr  valign='middle'>
                                                    <td>{$i}</td>
                                                    <td>{$user['email']}</td>
                                                    <td>{$name}</td>
                                                    <td>{$user['position']}</td>
                                                    <td>{$user['department']}</td>
                                                    <td>{$user['role']}</td>
                                                    <td align='right'>
                                                        <a href='form.php?id={$user['id']}&action=edit&role={$_SESSION['role']}' class='me-md-2 btn btn-sm btn-warning text-white'><i class='bx bx-message-square-edit' ></i> แก้ไข</a>
                                                        <a href='save.php?id={$user['id']}&action=delete' class='btn btn-sm btn-danger text-white'><i class='bx bx-message-square-minus' ></i> ลบ</a>
                                                    </td>
                                                    
                                                <tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js'></script> -->
</body>
</html>