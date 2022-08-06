<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Car\Position;

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
                        <h5>ข้อมูลตำแหน่ง</h5>
                        <a href="form.php" class="btn btn-warning text-white"><i class='bx bx-plus-medical' ></i> เพิ่มข้อมูล</a>
                    </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อตำแหน่ง</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $positionObj = new Position;
                                        $positions = $positionObj->getAllPosition(); 
                                        $i=0;
                                        foreach($positions as $position) {
                                            $i++;
                                            echo "
                                                <tr  valign='middle'>
                                                    <td>{$i}</td>
                                                    <td>{$position['name']}</td>
                                                    <td align='right'>
                                                        <a href='form.php?id={$position['id']}&action=edit' class='me-md-2 btn btn-sm btn-warning text-white'><i class='bx bx-message-square-edit' ></i> แก้ไข</a>
                                                        <a href='save.php?id={$position['id']}&action=delete' class='btn btn-sm btn-danger text-white'><i class='bx bx-message-square-minus' ></i> ลบ</a>
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