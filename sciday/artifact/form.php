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
    <div class="container">
        <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1>
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name ;?>&nbsp;&nbsp;&nbsp;</b></h2>
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
                            <input type="hidden" class="form-control" name="activity" value="<?php echo $activity_name;?>">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                            <div class="row mt-2">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">1. ชื่อผลงานสิ่งประดิษฐ์ทางวิทยาศาสตร <font color="red"> ภาษาไทย *</font></b></label>
                                        <input type="text" class="form-control w-75" name="artifact_name" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">2. ระดับการศึกษาที่เข้าร่วมประกวดโครงงานวิทยาศาสตร์ ประจำปี 2565<font color="red"> *</font></b></label>
                                    </div>
                                    <div class="form-group mt-2">
                                        <?php 
                                            $levels =$levelObj->getLevelByActivity(base64_decode($_REQUEST['activity']));
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
                                        <label for="" class="text-primary"><b class="fs-18">3. ชื่อสถาบันการศึกษา <font color="red">*</font> ตัวอย่างการกรอก 'โรงเรียน.......'<font color="red"> ห้ามใช้ ร.ร.</font></b></label>
                                        <input type="text" class="form-control w-75" name="school" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">4. ชื่อผู้ประดิษฐ์<font color="red">(ระบุชื่อผู้ประดิษฐ์ทุกคน สูงสุดไม่เกิน ๓ คน/โครงการ)*</font> <font color="red"></font></b></label>
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
                                        <label for="" class="text-primary"><b class="fs-18">5. อาจารย์ที่ปรึกษาโครงการ <font color="red">(ถ้ามี)</font></b></label>
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
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">6. Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4<font color="red">*</font></b></label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file_doc" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">7. Upload ไฟล์รูปภาพ <font color="red">( *.png หรือ *.jpg )</font> เท่านั้น</b></label>
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