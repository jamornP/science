<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
 use App\Model\Sciday\Level;
 $levelObj = new Level;   
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
    <div class="container">
        <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1>
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $_REQUEST['activity'];?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
           
        </div>
        
        <!-- <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3"> -->
            <!-- <div class="d-flex flex-row-reverse bd-highlight">
                <a href="#" class="btn btn-lg btn-outline-success my-bottom">สมัครแข่งขัน</a>
            </div> -->
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
                            <input type="hidden" class="form-control" name="activity" value="<?php echo $_REQUEST['activity'];?>">
                            <div class="row mt-2">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">1. ชื่อโครงงานวิทยาศาสตร์<font color="red">*</font></b></label>
                                        <input type="text" class="form-control w-75" name="project_name" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">2. ระดับการศึกษาที่เข้าร่วมประกวดโครงงานวิทยาศาสตร์ ประจำปี 2563<font color="red">*</font></b></label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <?php 
                                            $levels =$levelObj->getLevelByActivity('2');
                                            foreach($levels AS $level){
                                                echo "
                                                    <div class='form-check form-check-inline'>
                                                        <input class='form-check-input' type='radio' name='level_id' id='inlineRadio{$levle['id']}' value='{$level['id']}' checked>
                                                        <label class='form-check-label' for='inlineRadio{$levle['id']}'>{$level['name']}</label>
                                                    </div>
                                                ";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">3. ชื่อสถานศึกษา/โรงเรียน <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'<font color="red"> ห้ามใช้ ร.ร.</font></b></label>
                                        <input type="text" class="form-control w-75" name="school" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">รายชื่อผู้เข้าประกวดโครงงานวิทยาศาสตร์<font color="red">*</font> <font color="red">(ไม่เกิน 3 คน)</font></b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <div class="">
                                                        <select class="form-select" aria-label="Default select example" name="stitle[]">
                                                            <option selected>คำนำหน้าชื่อ</option>
                                                            <option value="1">เด็กชาย</option>
                                                            <option value="2">เด็กหญิง</option>
                                                            <option value="3">นาย</option>
                                                            <option value="3">นางสาว</option>
                                                            <option value="3">นาง</option>
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="sname[]">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="ssurname[]">
                                                    </div>
                                                    <button class="btn btn-success mx-2 btn-add text-white">+</button>
                                                    <button class="btn btn-danger btn-remove text-white">-</button>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">อาจารย์ที่ปรึกษาโครงงานวิทยาศาสตร์ <font color="red">(ไม่เกิน 2 คน)</font></b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <div class="">
                                                        <select class="form-select" aria-label="Default select example" name="ttitle[]">
                                                            <option selected>คำนำหน้าชื่อ</option>
                                                            <option value="1">เด็กชาย</option>
                                                            <option value="2">เด็กหญิง</option>
                                                            <option value="3">นาย</option>
                                                            <option value="3">นางสาว</option>
                                                            <option value="3">นาง</option>
                                                        </select>
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ" name="tname[]">
                                                    </div>
                                                    <div class="">
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นามสกุล" name="tsurname[]">
                                                    </div>
                                                    <button class="btn btn-success mx-2 btn-add text-white">+</button>
                                                    <button class="btn btn-danger btn-remove text-white">-</button>
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
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4<font color="red">*</font></b></label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file_doc" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์รูปภาพ <font color="red">( .png หรือ .jpg )</font> เท่านั้น</b></label>
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="dropzone" id="drop"></div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
    <br>
    <br>
    <br>
    <script src="js/script.js"></script>
    <script src="js/drop.js"></script>
    <script>
    function readURL(input) {
        if (input.files[1]) {
            let reader = new FileReader();
            document.querySelector('#imgControl').classList.replace("d-none", "d-block");
            reader.onload = function(e) {
                let element = document.querySelector('#imgUpload');
                element.setAttribute("src", e.target.result);
            }
            reader.readAsDataURL(input.files[1]);
           
        }
    }
    </script>
</body>
</html>