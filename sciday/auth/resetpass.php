<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2022</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/link.php";?>
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/components/navbar.php";?>
    <?php
        if($_GET['msg']) {
            echo "
            <div class='alert alert-danger' role='alert'>
                Email หรือ เบอร์โทรนี้ ไม่ถูกต้อง กรุณาลองอีกครั้ง
            </div>
      ";     
        }
    ?>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Reset Password</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="text-center" >
                            <img src="/science/sciday/images/user.jpg" class="rounded-circle" alt="...">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <form action="reset.php" class="" method="POST">
                            <div class="row">
                                
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="email" class="form-label text-primary fs-18 fw-bold"><i class='bx bx-envelope' ></i> Email</label>
                                        <input type="email" id="email" class="form-control" name="email" autofocus required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="tel"class="form-label text-primary fs-18 fw-bold"><i class='bx bx-phone' ></i> เบอร์โทร</label>
                                        <input type="text" id="tel" class="form-control" name="tel" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="password"class="form-label text-primary fs-18 fw-bold"><i class='bx bx-key' ></i>New Password</label>
                                        <input type="password" id="password" class="form-control" name="password" required >
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary mt-3">บันทึก</button>
                            </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
                
                <a href="login.php">เข้าสู่ระบบ</a>
            </div>
	    </div>
    </div>
</body>
</html>