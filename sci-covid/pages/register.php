<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
    use App\Model\Covid\Magor;
    $magorObj = new Magor;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sci-covid</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sci-covid/components/link.php";?>
</head>

<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sci-covid/components/navbar.php";?>
    <div class="container">
        <div class="card mt-5 shadow">
            <div class="card-header">
            <h5 class="card-title">ข้อมูลทั่วไป</h5>
            </div>
            <div class="card-body">
                <form action="save.php" method="post" enctype="multipart/form-data" id="">
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">ชื่อ</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="นายทดสอบ" name="name" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">นามสกุล</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="อุดมอนุรักษ์กุล" name="surname" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">เบอร์โทร</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="0123456789" name="tel" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">รหัสนักศึกษา</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="652302145" name="stu_num" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label"><b class="">ชั้นปี</b></label>
                            <select class="form-select" aria-label="Default select example" name="class">
                                <option selected>เลือก</option>
                                <option value="1">ปี1</option>
                                <option value="1">ปี2</option>
                                <option value="1">ปี3</option>
                                <option value="1">ปี4</option>
                                <option value="1">เจ้าหน้าที่</option>
                                <option value="2">อาจารย์</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label"><b class="">สาขาวิชา</b></label>
                            <select class="form-select" aria-label="Default select example" name="magor_id">
                                <option selected>เลือก</option>
                                <?php
                                    $magors = $magorObj->getAllMagor();
                                    foreach($magors As $magor){
                                        echo "
                                            <option value='{$magor['id']}'>{$magor['name']}</option>
                                        ";
                                    }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <label for="datepicker"class="form-label"><b class="">วันที่ทราบผล</b></label>
                            <input type="text" id="datepicker" class="form-control" required autocomplete="off" name="date_covid">
                        </div>
                        <div class="col-lg-3 col-md-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <label for="exampleFormControlTextarea1" class="form-label mt-3"><b class="">รายละเอียดสถานที่ไปใน คณะวิทยาศาสตร์ </b></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="remark"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group mt-2">
                                <div class="mb-3 w-75">
                                    <label for="formFileMultiple" class="form-label "><b class="">Upload ไฟล์รูปภาพ ผลตรวจ <font color="red">( *.png หรือ *.jpg )</font> เท่านั้น</b></label>
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
                    <button class="btn btn-primary mt-3" type="submit">บันทึก</button>
                    <!-- <a href="#" class="btn btn-primary mt-3">บันทึก</a> -->
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $("#datepicker").datepicker({
                language:'th-en',
                format: 'yyyy-mm-dd',
                minDate: 0,
                autoclose: true
                
            });
        });
    </script>
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