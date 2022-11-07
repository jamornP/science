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
            กิจกรรม Workshop
        </h3>
            <p>เวลา 13.00 น. - 14.00 น.</p>
        </a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        
            
        </ul>
        <div class="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
            
            
            <!-- <li class="nav-item">
            <a href="/car/pages/auth/register.php"class="nav-link active">ลงทะเบียน</a>
            </li> -->
        </div>
        </div>
    </div>
    </nav>
    <?php
        $json_string = 'https://script.google.com/macros/s/AKfycbzgJswwAhv_Z8eI53JFTE6Uo0Ey5-_LFiToSKi6eATCgygcbUDWTaNmY7xnwGIe342T/exec';
        $response = file_get_contents($json_string);
        $data11 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbx5uGO0bSR0ucne7dcRktOfGWCJcA7ujpZ8FYx2pg3-xyYOHhpFUEdRG8gPD2aDhXTj/exec';
        $response = file_get_contents($json_string);
        $data12 = json_decode($response, true); 
        $json_string = 'https://script.google.com/macros/s/AKfycbymnB0Na-IcCv7fNUMRxxWBGyT4IbuHswl8LZZnFjMuLcfA7brrT6ItKvUhqfNCcVGy4w/exec';
        $response = file_get_contents($json_string);
        $data21 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbwSvPQ7f5YIBotq33tp9xN1AhtZMS5SWBdmyrUKgWE8AB9LTYOAxsdd4-kSfZWryHZV/exec';
        $response = file_get_contents($json_string);
        $data22 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbzWq0R0gBSv7jBWm5DaSHM7AB7yO0G_PznMbwNESTS-UvIK6Q1kMe0Y5Hoe5n21doo-Ug/exec';
        $response = file_get_contents($json_string);
        $data31 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbzsr2-ph4Myvwinn1dWahf3fnUHeFCn2FXzhx1L0lK9crYn0RxZl_ZuWQwI7IHyZA12/exec';
        $response = file_get_contents($json_string);
        $data32 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycby1ZSTuWgrE71iTJwr5_L_yU7GiqOQc0qAlom7Sviil8U5_rmXjnQf4sa9OM4CTfpoj/exec';
        $response = file_get_contents($json_string);
        $data41 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbxcnfb2Vkv1cGu43oBwL6m6tlIIsEjZ43htGAroFtM6O5lBZdK1mKEnbJ80_pVJMwdwUg/exec';
        $response = file_get_contents($json_string);
        $data42 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbzVV5yp5aXw8odzAv6ZnsKOiuzTm83Ldn-Dmoj47YBu9uoMOB6ZIAatTM10nDkZgqMq/exec';
        $response = file_get_contents($json_string);
        $data51 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbwL_OMlpd0mIb6IQKWS4NxZZuMyeygy1kE6lsZe5gVsFoGPJahF4VAQmEnYgIJMqf-9/exec';
        $response = file_get_contents($json_string);
        $data52 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbypFOrFjlxV9SS1RVG7hDol6maM61tCgBrtXHv4__5kxNPO7VJ60zf_gxo2qrT7dzX7/exec';
        $response = file_get_contents($json_string);
        $data61 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbzlckTVOePmCoqhNKTEMrJ3jSqvEMny0Fdq-43jnIjGprCnHV0xD9n2cHbq8jnV8MudJw/exec';
        $response = file_get_contents($json_string);
        $data62 = json_decode($response, true);
        $num11 = count($data11['user']);
        $num12 = count($data12['user']);
        $num21 = count($data21['user']);
        $num22 = count($data22['user']);
        $num31 = count($data31['user']);
        $num32 = count($data32['user']);
        $num41 = count($data41['user']);
        $num42 = count($data42['user']);
        $num51 = count($data51['user']);
        $num52 = count($data52['user']);
        $num61 = count($data61['user']);
        $num62 = count($data62['user']);


    ?>
    <div class="container mt-5 font-kanit">
       
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop รอบที่ 1</h3>
            </div>
            <div class="card-body fs-18">
                <!-- <h4 class="card-title">Workshop วันที่ 11-12 พฤศจิกายน 2565 เวลา 13.00 น. - 14.00 น.</h4>
                <hr> -->
                
                <table class="table  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">กิจกรรม</th>
                            <th scope="col">สถานที่</th>
                            <th scope="col" width="8%">รับ(คน)</th>
                            <th scope="col" width="8%">วันศุกร์</th>
                            <th scope="col" width="8%">วันเสาร์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><a href="/science/workshop/data/1one.php">Physibot</a></td>
                            <td>ห้อง 602 อาคารพระจอมเกล้า</td>
                            <td>30</td>
                            <td><?php echo $num11;?></td>
                            <td><?php echo $num12;?></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="/science/workshop/data/2one.php">สนุกกับการขึ้นนรูปพลาสติก</a></td>
                            <td>ห้องปฏิบัติการพอลิเมอร์</td>
                            <td>30</td>
                            <td><?php echo $num21;?></td>
                            <td><?php echo $num22;?></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="/science/workshop/data/3one.php">นักสืบติดดิน</a></td>
                            <td>ห้อง 507 อาคารพระจอมเกล้า</td>
                            <td>40</td>
                            <td><?php echo $num31;?></td>
                            <td><?php echo $num32;?></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><a href="/science/workshop/data/4one.php">Data analyst Readiness</a></td>
                            <td>ห้อง 115 อาคารจุฬาภรณวลัยลักษณ์</td>
                            <td>30</td>
                            <td><?php echo $num41;?></td>
                            <td><?php echo $num42;?></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><a href="/science/workshop/data/5one.php">DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า</a></td>
                            <td>ห้อง 417 อาคารพระจอมเกล้า</td>
                            <td>40</td>
                            <td><?php echo $num51;?></td>
                            <td><?php echo $num52;?></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td><a href="/science/workshop/data/6one.php">micro:bit</a></td>
                            <td>ห้อง 213 อาคารจุฬาภรณวลัยลักษณ์ 2</td>
                            <td>30</td>
                            <td><?php echo $num61;?></td>
                            <td><?php echo $num62;?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <p>สรุปวันที่ <?php echo date("d/m/Y H:i:s");?></p>
                
            </div>
        </div>
<br>
<?php
        $json_string = 'https://script.google.com/macros/s/AKfycbyrDR_lAUlWS1J9Og9CPfBJClO1KXZY_FlZ-iP2n0cW9O9iYIPRcB7dVSYEH7HWbhdC/exec';
        $response = file_get_contents($json_string);
        $datatwo11 = json_decode($response, true);
        // $json_string = 'https://script.google.com/macros/s/AKfycbx5uGO0bSR0ucne7dcRktOfGWCJcA7ujpZ8FYx2pg3-xyYOHhpFUEdRG8gPD2aDhXTj/exec';
        // $response = file_get_contents($json_string);
        // $datatwo12 = json_decode($response, true); 
        $json_string = 'https://script.google.com/macros/s/AKfycbwRyTMbfa-8400Ki2Ek-z2Q-D71rV_ixfI9yYqdx6EcOtUDvhL4ttZhmN3yuql-GSz4/exec';
        $response = file_get_contents($json_string);
        $datatwo21 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbwYNB0ouD1KU5xvtqFduxcbqQRICoQDyKHZTtTSkiS0zbSNuaJR1v5ssUiqKf4jC22j/exec';
        $response = file_get_contents($json_string);
        $datatwo22 = json_decode($response, true);
        // $json_string = 'https://script.google.com/macros/s/AKfycbzWq0R0gBSv7jBWm5DaSHM7AB7yO0G_PznMbwNESTS-UvIK6Q1kMe0Y5Hoe5n21doo-Ug/exec';
        // $response = file_get_contents($json_string);
        // $datatwo31 = json_decode($response, true);
        // $json_string = 'https://script.google.com/macros/s/AKfycbzsr2-ph4Myvwinn1dWahf3fnUHeFCn2FXzhx1L0lK9crYn0RxZl_ZuWQwI7IHyZA12/exec';
        // $response = file_get_contents($json_string);
        // $datatwo32 = json_decode($response, true);
        // $json_string = 'https://script.google.com/macros/s/AKfycby1ZSTuWgrE71iTJwr5_L_yU7GiqOQc0qAlom7Sviil8U5_rmXjnQf4sa9OM4CTfpoj/exec';
        // $response = file_get_contents($json_string);
        // $datatwo41 = json_decode($response, true);
        // $json_string = 'https://script.google.com/macros/s/AKfycbxcnfb2Vkv1cGu43oBwL6m6tlIIsEjZ43htGAroFtM6O5lBZdK1mKEnbJ80_pVJMwdwUg/exec';
        // $response = file_get_contents($json_string);
        // $datatwo42 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbxRf8sCy3gsAXuDnwQAdv8pqx6PXFwQxAMJ2FR-QLgg3QpwibnsgGY1nHmWl1pJ4lYiHA/exec';
        $response = file_get_contents($json_string);
        $datatwo51 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbyDZd2rmohYoa-1iaY7OheUdYVem5sVRwUNDnVNj3FdZ78wgVVPXbzhCGytLtiRywVqUQ/exec';
        $response = file_get_contents($json_string);
        $datatwo52 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbzW5TQTcDja6Tp_qhIRsz3YubLbRVm2POQn_zmhK67pi9L_aBsGeCnjbavDzaV00KRC/exec';
        $response = file_get_contents($json_string);
        $datatwo61 = json_decode($response, true);
        $json_string = 'https://script.google.com/macros/s/AKfycbzmHPvd8QvXd3cbTE09XGctoNceQLE6S6qZC2H-S6c9saJvbVaiiEUUmKX63OlH9qAcFg/exec';
        $response = file_get_contents($json_string);
        $datatwo62 = json_decode($response, true);
        $numtwo11 = count($datatwo11['user']);
        // $numtwo12 = count($datatwo12['user']);
        $numtwo21 = count($datatwo21['user']);
        $numtwo22 = count($datatwo22['user']);
        // $numtwo31 = count($datatwo31['user']);
        // $numtwo32 = count($datatwo32['user']);
        // $numtwo41 = count($datatwo41['user']);
        // $numtwo42 = count($datatwo42['user']);
        $numtwo51 = count($datatwo51['user']);
        $numtwo52 = count($datatwo52['user']);
        $numtwo61 = count($datatwo61['user']);
        $numtwo62 = count($datatwo62['user']);


    ?>
    <div class="container mt-5 font-kanit">
       
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop รอบที่ 2</h3>
            </div>
            <div class="card-body fs-18">
                <!-- <h4 class="card-title">Workshop วันที่ 11-12 พฤศจิกายน 2565 เวลา 13.00 น. - 14.00 น.</h4>
                <hr> -->
                
                <table class="table  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">กิจกรรม</th>
                            <th scope="col">สถานที่</th>
                            <th scope="col" width="8%">รับ(คน)</th>
                            <th scope="col" width="8%">วันศุกร์</th>
                            <th scope="col" width="8%">วันเสาร์</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><a href="/science/workshop/data/1two.php">Physibot</a></td>
                            <td>ห้อง 602 อาคารพระจอมเกล้า</td>
                            <td>30</td>
                            <td><?php echo $numtwo11;?></td>
                            <td>ไม่รับ</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="/science/workshop/data/2two.php">สนุกกับการขึ้นนรูปพลาสติก</a></td>
                            <td>ห้องปฏิบัติการพอลิเมอร์</td>
                            <td>30</td>
                            <td><?php echo $numtwo21;?></td>
                            <td><?php echo $numtwo22;?></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><a href="/science/workshop/data/3two.php">นักสืบติดดิน</a></td>
                            <td>ห้อง 507 อาคารพระจอมเกล้า</td>
                            <td>40</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><a href="/science/workshop/data/4two.php">Data analyst Readiness</a></td>
                            <td>ห้อง 115 อาคารจุฬาภรณวลัยลักษณ์</td>
                            <td>30</td>
                            <td>ไม่รับ</td>
                            <td>ไม่รับ</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><a href="/science/workshop/data/5two.php">DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า</a></td>
                            <td>ห้อง 417 อาคารพระจอมเกล้า</td>
                            <td>40</td>
                            <td><?php echo $numtwo51;?></td>
                            <td><?php echo $numtwo52;?></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td><a href="/science/workshop/data/6two.php">micro:bit</a></td>
                            <td>ห้อง 213 อาคารจุฬาภรณวลัยลักษณ์ 2</td>
                            <td>30</td>
                            <td><?php echo $numtwo61;?></td>
                            <td><?php echo $numtwo62;?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <p>สรุปวันที่ <?php echo date("d/m/Y H:i:s");?></p>
                
            </div>
        </div>
        <!-- <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow bg-292">
                    <img src="/science/workshop/images/01_0.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >ลงทะเบียน (รับจำนวนจำกัด)</h5>
                  
                        <a href="https://forms.gle/53pRy9hFGM8PMXds8" class="btn bg-249  mt-2">วันที่ 11 พฤศจิกายน 2565</a>
                        <a href="https://forms.gle/ga6tU6MoJpih1GQs8" class="btn bg-123 text-white mt-2">วันที่ 12 พฤศจิกายน 2565</a>
                    </div>
                    
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow bg-292">
                    <img src="/science/workshop/images/02_0.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >ลงทะเบียน (รับจำนวนจำกัด)</h5>
                        <a href="https://forms.gle/UmUHbxDFH4QiYXjc7" class="btn bg-249  mt-2">วันที่ 11 พฤศจิกายน 2565</a>
                        <a href="https://forms.gle/wLhLo2Sj3V9kT23y5" class="btn bg-123 text-white mt-2">วันที่ 12 พฤศจิกายน 2565</a>
                    </div>
                   
                </div>

            </div>
            <div class="col">
                <div class="card h-100 shadow bg-292">
                    <img src="/science/workshop/images/03_0.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >ลงทะเบียน (รับจำนวนจำกัด)</h5>
                        <a href="https://forms.gle/cDpKKrEbaH8oeVJV7" class="btn bg-249  mt-2">วันที่ 11 พฤศจิกายน 2565</a>
                        <a href="https://forms.gle/Cw16GJmU6dLbRdM39" class="btn bg-123 text-white mt-2">วันที่ 12 พฤศจิกายน 2565</a>
                    </div>
                    
                </div>
                
            </div>
            <div class="col">
                <div class="card h-100 shadow bg-292">
                    <img src="/science/workshop/images/04_0.png" class="card-img-top " alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >ลงทะเบียน (รับจำนวนจำกัด)</h5>
                        <a href="https://forms.gle/TePoXpXMMXCg3rqT9" class="btn bg-249  mt-2">วันที่ 11 พฤศจิกายน 2565</a>
                        <a href="https://forms.gle/p4Rbnkbdqqs4n52L6" class="btn bg-123 text-white mt-2">วันที่ 12 พฤศจิกายน 2565</a>
                    </div>
                    
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow bg-292">
                    <img src="/science/workshop/images/05_0.png" class="card-img-top " alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >ลงทะเบียน (รับจำนวนจำกัด)</h5>
                        <a href="https://forms.gle/ahfpNWf5m1QhY9XN8" class="btn bg-249  mt-2">วันที่ 11 พฤศจิกายน 2565</a>
                        <a href="https://forms.gle/qZtb6FQUeQnJW2qKA" class="btn bg-123 text-white mt-2">วันที่ 12 พฤศจิกายน 2565</a>
                    </div>
                    
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow bg-292">
                    <img src="/science/workshop/images/06.png" class="card-img-top " alt="...">
                    <div class="card-body">
                        <h5 class="card-title" >ลงทะเบียน (รับจำนวนจำกัด)</h5>
                        <a href="https://forms.gle/sM6wuHYcfSwqMSev9" class="btn bg-249  mt-2">วันที่ 11 พฤศจิกายน 2565</a>
                        <a href="https://forms.gle/Dgi5B8PLdVLBRcKe7" class="btn bg-123 text-white mt-2">วันที่ 12 พฤศจิกายน 2565</a>
                    </div>
                    
                </div>
            </div>
        </div> -->
        <br>
        
    </div>
<?php 
?>
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