<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งซ่อม</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/tcas66/components/link.php"; ?>
</head>

<body class="font-kanit">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/tcas66/components/navbar.php"; ?>

<nav class="navbar navbar-dark bg-253 ">
  <div class="container-fluid fs-14">
    <a class="navbar-brand fs-16">ลงทะเบียน</a>
    <ul class="nav justify-content-end ">
        <!-- <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Link</a>
        </li> -->
        
    </ul>
  </div>
</nav>
<div class="container mt-4">
    <div class="card">
        <h5 class="card-header bg-253">กรุณาอ่านก่อน</h5>
        <div class="card-body ">
            <h5 class="card-title"></h5>
            <p class="card-text text-danger fs-18">*** กรุณาตรวจสอบข้อมูลความถูกต้อง ก่อนทำการกดบันทึก เพราะระบบจะนำข้อมูลที่ท่านกรอกไปจัดทำใบประกาศนียบัตร ซึ่งจะไม่สามารถแก้ไขได้หลักจากออกใบประกาศนียบัตรแล้ว </p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <form action="save.php" class="" method="POST">
                <div class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="username" placeholder="name@gmail.com" name="username" autofocus required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">นามสกุล</label>
                                        <input type="text" class="form-control" id="surname" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="school" class="form-label">โรงเรียน</label>
                                        <input type="text" class="form-control" id="school" name="school" placeholder="โรงเรียนกรรณสูตศึกษาลัย" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="tel" class="form-label">เบอร์ติดต่อ</label>
                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="0123456789" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email ที่ติดต่อได้</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            
                            
                        
                        </div>
                    </div>
                
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2 mt-2" type="submit">บันทึก</button>
                    <!-- <button class="btn btn-primary" type="button">Button</button> -->
                </div>
            </form>
            
        </div>
    </div>
</div>
</body>

</html>