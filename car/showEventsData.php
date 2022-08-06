<?php
require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";
require($_SERVER['DOCUMENT_ROOT'].'/science/function/function.php');
use App\Model\Car\Book;
use App\Model\Car\Position;
use App\Model\Car\Department;
use App\Model\Car\Choose;
use App\Model\Car\Car;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองรถ</title>
    <link rel="stylesheet" href="../lib/lib/jquery.fancybox.css" media="screen">
    <link rel="stylesheet" href="../lib//fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="../lib//fullcalendar/fullcalendar.print.css" media='print'>
    <link rel="stylesheet" href="../theme/css/bootstrap-theme.css">
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="../lib/lib/jquery/dist/jquery.min.js"></script>
    <script src="../lib/lib/moment.min.js"></script>
    <script src="../lib//fullcalendar/fullcalendar.min.js"></script>
    <script src="../lib/lib/lang/th.js"></script>
    <script src="../lib/lib/jquery.fancybox.pack.js"></script>
</head>
<body class="font-kanit mt-0 fs-14">
<?php

    $bookObj = new Book;
    $book = $bookObj->getBookById($_REQUEST['id']);

?>
    <div class="row fs-14">
        <div class="col-12">
            <div class="card md-2">
                <div class="card-header text-white align-items-center"style="background-color:<?php echo $book['color'];?>">
                    <h5>รายละเอียด</h5>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ประเภทรถ</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['car'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>วันที่</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo datethai($book['start_date'])." เวลา ".$book['start_time']." น" ;?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ถึงวันที่</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo datethai($book['end_date']) ." เวลา ".$book['end_time']." น";?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>จุดประสงค์การใช้รถ</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['title'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ต้องการให้</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['choose'];?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ต้นทาง</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['origin'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ปลายทาง</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['destination'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>จำนวนผู้โดยสาร</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['count']." คน";?>
                            </div>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ผู้โดยสาร</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['people'];?>
                            </div>
                        </div>
                    </div>                
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>รายละเอียดเพิ่มเติม</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['remark'];?>
                            </div>
                        </div>
                    </div>
                    <h3>ผู้ขอ</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ชื่อ - สกุล</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['name']." ".$book['surname'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ตำแหน่ง</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['position'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>สังกัด</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['department'];?>
                            </div>
                        </div>
                    </div>
                    
                    <h3>พขร</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>เลขทะเบียน</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['number'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ชื่อ - สกุล</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['staff'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>ตำแหน่ง</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm alert-success">
                                <?php echo $book['staff_tel'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-sm alert-info">
                            <b>สถานะ</b> 
                            </div> 
                        </div>
                        <div class="col-sm mt-0">
                            <div class="alert alert-sm text-white" style="background-color:<?php echo $book['color'];?>">
                                <?php echo $book['status'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-sm">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        </div>
    </div>
</body>
</html>
