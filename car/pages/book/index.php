<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php";;
use App\Model\Car\Book;
use App\Model\Car\Timebook;

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
    <div class="container-fuld">
        <?php require $_SERVER['DOCUMENT_ROOT']."/science/car/components/navbar.php";?>

    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h5>ข้อมูลจองรถทั้งหมด</h5>
                        <div>
                        <a href="/car/" class="btn btn-success text-white">ดูปฏิทิน</a>
                        <!-- <a href="form.php" class="btn btn-warning text-white">เพิ่มข้อมูล</a> -->
                        </div>
                        
                    </div>
                        <div class="card-body">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>วันที่ใช้รถ</th>
                                        <th>เวลา</th>
                                        <th>ปลายทาง</th>
                                        <th>เพื่อ</th>
                                        <th>รถ</th>
                                        <th>ผู้ขอ</th>
                                        <th>สถานะ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $bookObj = new Book;
                                        $books = $bookObj->getAllBook2(); 
                                        $i=0;
                                        foreach($books as $book) {
                                            $i++;
                                            $name=$book['name']." ".$book['surname'];
                                            $ds=datethai($book['start_date']);
                                            if($_SESSION['role']=='admin'){
                                                echo "
                                                    <tr>
                                                        <td>{$i}</td>
                                                        <td>{$ds}</td>
                                                        <td>{$book['start_time']}</td>
                                                        <td>{$book['destination']}</td>
                                                        <td>{$book['title']}</td>
                                                        <td>{$book['car']}</td>
                                                        <td>{$name}</td>
                                                        <td>
                                                            <div class='d-grid'>
                                                                <a href='/science/car/pages/manage/form.php?id={$book['id']}&action=edit' class='btn btn-sm text-white' style='background-color:{$book['color']}'>{$book['status']}</a>
                                                            </div>
                                                        </td>
                                                        <td align='right'>
                                                            
                                                            <a href='form.php?id={$book['id']}&action=edit' class='me-md-2 btn btn-sm btn-warning text-white'><i class='bx bx-message-square-edit' ></i> แก้ไข</a>
                                                            <a href='save.php?id={$book['id']}&action=delete' class='me-md-2 btn btn-sm btn-danger text-white'><i class='bx bx-message-square-minus' ></i> ลบ</a>
                                                        </td>
                                                    </tr>
                                                ";
                                            }elseif($_SESSION['role']=='moderator'){
                                                echo "
                                                    <tr>
                                                        <td>{$i}</td>
                                                        <td>{$ds}</td>
                                                        <td>{$book['start_time']}</td>
                                                        <td>{$book['destination']}</td>
                                                        <td>{$book['title']}</td>
                                                        <td>{$book['car']}</td>
                                                        <td>{$name}</td>
                                                        <td>
                                                            <div class='d-grid'>
                                                                <a href='/science/car/pages/manage/form.php?id={$book['id']}&action=edit' class='btn btn-sm text-white' style='background-color:{$book['color']}'>{$book['status']}</a>
                                                            </div>
                                                        </td>
                                                        <td align='right'>
                                                            
                                                        </td>
                                                    </tr>
                                                ";
                                            }
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