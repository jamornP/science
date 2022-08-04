<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
    use App\Model\Covid\Magor;
    $magorObj = new Magor;
    use App\Model\Covid\Cl;
    $clObj = new Cl;
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
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <?php
        // echo $_REQUEST['msg'];
        if($_REQUEST['msg']=="success"){
            echo "
                <div class='alert alert-success d-flex align-items-center' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                    <div>
                    บันทึกข้อมูลเรียบร้อย
                    </div>
                </div>
            "; 
            // header('Refresh:5; url=index.php');
        }elseif($_REQUEST['msg']=="error"){
            echo "
                <div class='alert alert-danger d-flex align-items-center' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                    บันทึกไม่สำเร็จ
                    </div>
                </div>
            "; 
        }else{

        }
    ?>
    <div class="container">
        
        <div class="card mt-5 shadow">
            <div class="card-header bg-d">
                <!-- <h3 class="text-center text-success"><b>ติดต่องานกิจการนักศึกษา</b><br></h3>
                <h3 class="text-center text-danger"><b>Tel : 089-966-0233 ติดต่อเฉพาะเวลาราชการ</b></h3> -->
                <h5 class="card-title text-white mt-2">ข้อมูลทั่วไป</h5>
            </div>
            <div class="card-body">
                
                <form action="save.php" method="post" enctype="multipart/form-data" id="">
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">ชื่อ</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">นามสกุล</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="surname" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">เบอร์โทร</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="tel" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b class="">รหัสนักศึกษา</b></label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="stu_num" require>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <label for="exampleFormControlInput1" class="form-label"><b class="">ชั้นปี</b></label>
                            <select class="form-select" aria-label="Default select example" name="class_id">
                                <option selected>เลือก</option>
                                <?php
                                    $cls = $clObj->getAllCl();
                                    foreach($cls As $cl){
                                        echo "
                                            <option value='{$cl['id']}'>{$cl['name']}</option>
                                        ";
                                    }
                                ?>
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
                                    <label for="formFileMultiple" class="form-label "><b class="">Upload ไฟล์รูปภาพ ผลตรวจ<font color="red">( *.png หรือ *.jpg )</font> เท่านั้น</b></label>
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