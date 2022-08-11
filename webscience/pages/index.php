<?php require $_SERVER['DOCUMENT_ROOT']."/science/webscience/auth/auth.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web science Backend</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/webscience/components/link.php";?>
</head>

<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/webscience/components/navbar.php";?>
<?php// header('Location: /science/webscience/pages/intro.php'); ?>
    <div class="container mt-5">
        <div class="card">
        <h5 class="card-header bg-la">Upload ข่าวหน้าเว็บ Science</h5>
            <div class="card-body">
               
                <div class="row">
                    <!-- <div class="col"> 
                        <h5 class="card-title">ตัวอย่าง จะโชว์รูปภาพที่หน้านี้</h5>
                        <img src="/science/webscience/images/exsample.jpg"  width="500" height="600" class="img-fluid" alt="...">
                    </div> -->
                    <div class="col"> 
                        <h5 class="card-title">รูปปัจจุบัน</h5>
                        <img src="/science/upload/webscience/picshow.png"  width="500" height="600" class="img-fluid" alt="...">
                    </div>
                </div>
                
                
                <form action="" method="post" enctype="multipart/form-data" id="">
                    <br>
                    
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group mt-2">
                                <div class="mb-3 w-75">
                                    <label for="formFileMultiple" class="form-label "><b class="">Upload ไฟล์รูปภาพ <font color="red">( *.png  )</font> เท่านั้น</b></label>
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
                    <!-- <button class="btn btn-primary mt-3" type="submit">บันทึก</button> -->
                
                </form>
                <a href="/science/webscience/pages/" class="btn btn-primary mt-3">ยืนยัน</a>
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
    <!-- <script src="js/script.js"></script> -->
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