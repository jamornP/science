<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Activity;
    $activityObj = new Activity; 
    $activitys = $activityObj->getActivityById(base64_decode($_REQUEST['activity']));
    $activity_name = $activitys['name'];
 use App\Model\Sciday\Level;
 $levelObj = new Level;   
 use App\Model\Sciday\Title;
 $titleObj = new Title; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="font-prompt fs-18">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php if($_REQUEST['error']){
        echo "
            <div class='alert alert-danger d-flex align-items-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div>
                    {$_REQUEST['error']}
                </div>
            </div>
        ";
    }
    ?>
    <div class="container">
        <!-- <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1> -->
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;การแข่งขันประกวดโครงงาน IoT&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
        </div>
        <div class="container mt-3 ">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4> กรอกรายละเอียดใบสมัคร</h4>
                    </div>
                    <div class="card-body">
                        <hr class="text-warning">
                        <h5 class="text-primary"><b>ส่วนที่ 1 ใช้ในการสมัคร</b></h5>
                        <hr class="text-warning">
                        <form action="save.php" method="post" enctype="multipart/form-data" id="">
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">1. ชื่อโครงงาน <font color="red">*</font></b></label>
                                        <input type="text" class="form-control w-75" name="iot_name" autofocus required>
                                        <input type="hidden" class="form-control w-75" name="level_id"  value="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">2. ชื่อสถานศึกษา/โรงเรียน <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'<font color="red"> ห้ามใช้ ร.ร.</font></b></label>
                                        <input type="text" class="form-control w-75" name="school" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">3. รายชื่อคุณครูผู้เข้าประกวดโครงงาน <font color="red">* (ไม่เกิน 2 คน)</font></b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <div class="">
                                                        <select class="form-select" aria-label="Default select example" name="ttitle[]">
                                                            <option selected>คำนำหน้าชื่อ</option>
                                                            <?php 
                                                                // foreach($titles AS $title){
                                                                //     echo "
                                                                //         <option value='{$title['id']}'>{$title['name']}</option>
                                                                //     ";
                                                                // }
                                                            ?>
                                                            <!-- <option value="1">เด็กชาย</option>
                                                            <option value="2">เด็กหญิง</option>-->
                                                            <option value="3">นาย</option>
                                                            <option value="4">นางสาว</option>
                                                            <option value="5">นาง</option> 
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="tsurname[]">
                                                    </div>
                                                    <button class="btn btn-success mx-2 tbtn-add text-white">เพิ่ม</button>
                                                    <button class="btn btn-danger tbtn-remove text-white">ลบ</button>
                                                </div>
                                            </li>
                                            
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">4. รายชื่อนักเรียนผู้เข้าประกวดโครงงาน<font color="red">*</font> <font color="red">(ไม่เกิน 3 คน)</font></b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <div class="">
                                                        <select class="form-select" aria-label="Default select example" name="stitle[]">
                                                            <option selected>คำนำหน้าชื่อ</option>
                                                            <?php 
                                                                $titles = $titleObj->getAllTitle();
                                                                foreach($titles AS $title){
                                                                    echo "
                                                                        <option value='{$title['id']}'>{$title['name']}</option>
                                                                    ";
                                                                }
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="ssurname[]">
                                                    </div>
                                                    <button class="btn btn-success mx-2 sbtn-add text-white">เพิ่ม</button>
                                                    <button class="btn btn-danger sbtn-remove text-white">ลบ</button>
                                                </div>
                                            </li>
                                            
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="tel" class="form-label text-primary "><b class="fs-18">5. เบอร์โทรศัพท์ติดต่อ <font color="red">*</font></b></label>
                                            <input class="form-control" type="text" id="tel" name="tel" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">6. Upload ไฟล์ใบสมัคร เป็นไฟล์ PDF เท่านั้น <font color="red">* </font></b></label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file_doc" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="text-warning">
                           
                                            
                            <!-- <div class="form-control"> -->
                                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
                
            </div>

    </div>
    <script src="js/script.js"></script>
</body>
</head>