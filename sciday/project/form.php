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
<body class="font-prompt">
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
                        <form action="save.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control" name="activity" value="<?php echo $_REQUEST['activity'];?>">
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-10 col-lg-8">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">1. ชื่อโครงงานวิทยาศาสตร์</b></label>
                                        <input type="text" class="form-control" name="project" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-10 col-lg-8">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">2. ระดับการศึกษาที่เข้าร่วมประกวดโครงงานวิทยาศาสตร์ ประจำปี 2563</b></label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-10 col-lg-8">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">ชื่อโรงเรียน ให้ใส่คำว่า <font color="red">'โรงเรียน'</font> ด้วย</b></label>
                                        <input type="text" class="form-control" name="school" autofocus required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">ผู้เข้าประกวด</b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <input type="text" class="form-control w-75" name="name[]" required>
                                                    <button class="btn btn-success mx-2 btn-add text-white">+</button>
                                                    <button class="btn btn-danger btn-remove text-white">-</button>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <div class="form-group mt-2">
                                        <div class="mb-3 w-75">
                                            <label for="formFileMultiple" class="form-label text-primary "><b class="fs-18">Upload ไฟล์ใบสมัคร ความยาวไม่เกิน 5 หน้ากระดาษ A4</b></label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file[]" multiple required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <div class="form-group mt-2">
                                        <label for="" class="text-primary"><b class="fs-18">อาจารย์ที่ปรึกษา</b></label>
                                        <ol>
                                            <li>
                                                <div class="d-flex mb-2">
                                                    <input type="text" class="form-control w-75" name="tname[]">
                                                    <button class="btn btn-success mx-2 btn-add text-white">+</button>
                                                    <button class="btn btn-danger btn-remove text-white">-</button>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <hr class="text-warning">
                            <h5 class="text-primary"><b>ส่วนที่ 2 ใช้ในการเข้าสูระบบ</b></h5>
                            <hr class="text-warning">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">Username</b></label>
                                        <input type="text" class="form-control" name="username" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">Password</b></label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18 ">E-mail</b></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">เบอร์โทรศัพท์ <font color="red">ไม่ต้องใส่ '-'</font></b></label>
                                        <input type="text" class="form-control" name="tel" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">ชื่อ</b></label>
                                        <input type="text" class="form-control" name="uname" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="text-primary"><b class="fs-18">นามสกุล</b></label>
                                        <input type="text" class="form-control" name="usurname" required>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-control"> -->
                                <div class="d-flex flex-row-reverse bd-highlight mt-3">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
                
            </div>


        
            
        <!-- </div> -->
        
        
    </div>
    <br>
    <br>
    <br>
    <script src="js/script.js"></script>
</body>
</html>