<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMPUS TOUR @SCI KMITL</title>
    <link rel="stylesheet" href="/science/lib/lib/jquery.fancybox.css" media="screen">
    <link rel="stylesheet" href="/science/lib/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="/science/lib/fullcalendar/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="/science/theme/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/science/theme/css/style_workshop.css">
    <link rel="stylesheet" href="/science/lib/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="/science/theme/css/datepicker.css">
    <link rel="stylesheet" href="/science/theme/css/admin.css">
    <link rel="stylesheet" href="/science/theme/css/color.css">
    <!-- Toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>



</head>
<body class="font-kanit bg-140">
<nav class="navbar navbar-expand-md navbar-dark bg-133 align-items-center">
  <div class="container-fluid align-items-center">
    <a class="navbar-brand " href="">
    <h3>
        <img src="/science/workshop/images/logo.png" alt="" width="60" height="48" class="d-inline-block align-text-top">
        กิจกรรม Workshop รอบที่ 2
    </h3>
        <p>เวลา 14.30 น. - 15.30 น.</p>
    </a>
  </div>
</nav>

<?php
$json_string = 'https://script.google.com/macros/s/AKfycbwRyTMbfa-8400Ki2Ek-z2Q-D71rV_ixfI9yYqdx6EcOtUDvhL4ttZhmN3yuql-GSz4/exec';
$response = file_get_contents($json_string);
$data1 = json_decode($response, true);
$json_string = 'https://script.google.com/macros/s/AKfycbwYNB0ouD1KU5xvtqFduxcbqQRICoQDyKHZTtTSkiS0zbSNuaJR1v5ssUiqKf4jC22j/exec';
$response = file_get_contents($json_string);
$data2 = json_decode($response, true);
?>
<div class="container mt-5">
    <div class="card">
        <h5 class="card-header">รายชื่อกิจกรรม สนุกกับการขึ้นรูปพลาสติก วันที่ 11 พ.ย. 2565</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">คำนำหน้า</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">โรงเรียน</th>
                        <th scope="col">date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($data1['user'] as $key => $value) {
                        $i++;
                        $title=$data1["user"][$key]["title"];
                        $name=$data1["user"][$key]["name"];
                        $surname=$data1["user"][$key]["surname"];
                        $school=$data1["user"][$key]["school"];
                        $date=$data1["user"][$key]["date"];
                        echo "
                            <tr>
                                <th scope='row'>{$i}</th>
                                <td>{$title}</td>
                                <td>{$name}</td>
                                <td>{$surname}</td>
                                <td>{$school}</td>
                                <td>{$date}</td>
                            </tr>
                        ";
                    }
                ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>  
</div>
<div class="container mt-5">
    <div class="card">
        <h5 class="card-header">รายชื่อกิจกรรม สนุกกับการขึ้นรูปพลาสติก วันที่ 12 พ.ย. 2565</h5>
        <div class="card-body">
            <table class="table">
            <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">คำนำหน้า</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">โรงเรียน</th>
                        <th scope="col">date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    foreach ($data2['user'] as $key => $value) {
                        $i++;
                        $title=$data2["user"][$key]["title"];
                        $name=$data2["user"][$key]["name"];
                        $surname=$data2["user"][$key]["surname"];
                        $school=$data2["user"][$key]["school"];
                        $date=$data2["user"][$key]["date"];
                        echo "
                            <tr>
                                <th scope='row'>{$i}</th>
                                <td>{$title}</td>
                                <td>{$name}</td>
                                <td>{$surname}</td>
                                <td>{$school}</td>
                                <td>{$date}</td>
                            </tr>
                        ";
                    }
                ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>  
</div>


<script src='/science/lib/lib/jquery/dist/jquery.min.js'></script>

<script src='/science/lib/lib/moment.min.js'></script>
<script src='/science/lib/fullcalendar/fullcalendar.min.js'></script>
<script src='/science/lib/lib/lang/th.js'></script>
<script src='/science/lib/lib/jquery.fancybox.pack.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js'></script>
<script src="/science/lib/dropzone/min/dropzone.min.js"></script>
<script src='/science/theme/js/bootstrap-datepicker.js'></script>
<script src='/science/theme/js/bootstrap-datepicker-thai.js'></script>
<script src='/science/theme/js/locales/bootstrap-datepicker.th.js'></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    // Command: toastr["success"]("ข้อความ")

    //ตัวนี้จะเอาไว้ set ค่าต่างๆ toastr
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
</body>
</html>