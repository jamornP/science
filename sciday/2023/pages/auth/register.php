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

<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php
    if (isset($_GET['msg'])) {
        if($_GET['msg']=='ok'){
            $mes="ลงทะเบียนเรียบร้อย";
            echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 3000 })</script>";  
            echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/science/sciday/2023/pages/auth/login.php'} , 4000);
            </script>
        ";
        }elseif($_GET['msg']=='error'){
            $mes="Email นี้ลงทะเบียนแล้ว";
            echo "<script type='text/javascript'>toastr.error('" . $mes . "', { timeOut: 3000 })</script>";
        }
    }
    ?>

    <div class="container mt-5">
        <div class="card border-success shadow">
            <h5 class="card-header"><b>ลงทะเบียน</b> </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="text-center">
                            <img src="/science/sciday/images/user.jpg" class="rounded-circle" alt="...">
                            <br>
                            
                        </div>
                        หมายเหตุ : <b class="text-danger">เฉพาะผู้ที่เป็นคนยื่นใบสมัครเท่านั้นเช่น อาจารย์ที่ปรึกษา หรือ ตัวแทนนักเรียน 1 ท่านในกิจกรรมนั้นๆ</b>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <form action="save.php" class="" method="POST">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="email" class="form-label text-primary fs-18 fw-bold"><i class='bx bx-envelope'></i> Email</label>
                                        <input type="email" id="email" class="form-control" name="email" autofocus required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="password" class="form-label text-primary fs-18 fw-bold"><i class='bx bx-key'></i> Password</label>
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">

                                    <div class="form-group">
                                        <label for="name" class="form-label text-primary fs-18 fw-bold"><i class='bx bx-edit-alt'></i> ชื่อ</label>
                                        <input type="text" id="name" class="form-control" name="name" required>
                                        <input type="hidden" id="action" class="form-control" name="action" value="add">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="surname" class="form-label text-primary fs-18 fw-bold"> <i class='bx bx-edit-alt'></i> นามสกุล</label>
                                        <input type="text" id="surname" class="form-control" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label for="tel" class="form-label text-primary fs-18 fw-bold"><i class='bx bx-phone'></i> เบอร์โทร</label>
                                        <input type="text" id="tel" class="form-control" name="tel" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary mt-3">ลงทะเบียน</button>
                            </div>
                        </form>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>