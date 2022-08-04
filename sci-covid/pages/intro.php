
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
<?php
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
    }
?>
<?php //header('Location: /science/sci-covid/pages/register.php'); ?>
<div class="container">
    <div class="card text-center mt-5">
        <div class="card-header bg-primary text-white">
            <h5 class="mt-2">แนวปฏิบัติกรณีพบผู้ที่ติดเชื้อ COVID-19 ในสถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</h5>
        </div>
        <div class="card-body mt-3">
            <div class="row">
                <div class="col-lg-4">
                    <img src="/science/sci-covid/images/news01.jpg" class="img-thumbnail shadow" alt="...">
                </div>
                <div class="col-lg-8">
                    <div class="card shadow bg-l">
                        <!-- <h5 class="card-header">Featured</h5> -->
                        <div class="card-body">
                            <h4 class="card-title">📲 ติดต่อ KMITL Medical Center เพื่อรับบริการ Home Isolation</h4>
                            <h4 class="card-text">
                                🔸 ID Line : kmitl41371<br>
                                🔸 โทร 096-873-5799
                            </h4>
                        </div>
                    </div>
                    
                    <div class="card shadow bg-la">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <img src="/science/sci-covid/images/qrcode.jpg" class="img-thumbnail" alt="...">
                                    
                                </div>
                                <div class="col-lg col-md text-white">
                                    <h3>กรณีนักศึกษา <b class="text-primary">คณะวิทยาศาสตร์</b> ตรวจพบเชื้อ</h3><br><hr>
                                    <h5>
                                        1.ให้กรอกข้อมูลลงในระบบ Scan QRcode  <br><br><br>หรือ<br><br><br>
                                        <span class="spinner-grow spinner-grow-sm text-white" role="status" aria-hidden="true"></span> 
                                        <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span>
                                        <a href="/science/sci-covid/pages/register.php" class="btn btn-primary">Click here</a>
                                        <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span>
                                        <span class="spinner-grow spinner-grow-sm text-white" role="status" aria-hidden="true"></span> 
                                    </h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="card-footer text-muted">
       
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-6">
           
        </div>
        <div class="col-lg-4 col-md-6"></div>
        <div class="col-lg-4 col-md-6"></div>
        <div class="col-lg-4 col-md-6"></div>
    </div>
</div>


</body>

</html>