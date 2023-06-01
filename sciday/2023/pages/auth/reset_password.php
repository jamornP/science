<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php //print_r($_SESSION);
    ?>
    <div class="container mt-5">
        <?php
            if (isset($_GET['msg'])) {
                if($_GET['msg']=='ok'){
                    $mes="เปลี่ยน Password Success";
                    echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";  
                    echo "  
                    <script type='text/javascript'>
                        setTimeout(function(){location.href='/science/sciday/2023/pages/auth/login.php'} , 3000);
                    </script>
                ";
                }elseif($_GET['msg']=='error'){
                    $mes="Email หรือ เบอร์โทร ไม่ถูกต้อง";
                    echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 2000 })</script>";
                }
            }
        ?>
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
                        <form action="save.php" class="" method="POST">
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
                                        <input type="hidden" name="action"  id="action" class="form-control" value="edit">
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