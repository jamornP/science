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
                <!-- <p>เวลา 13.00 น. - 14.00 น.</p> -->
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
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
    ?>
    <div class="container mt-5 font-kanit">
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop Physibot</h3>
            </div>
            <div class="card-body fs-18">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ที่</th>
                            <th scope="col" width="10%">คำนำหน้า</th>
                            <th scope="col" width="15%">ชื่อ</th>
                            <th scope="col" width="20%">นามสกุล</th>
                            <th scope="col" width="">กิจกรรม</th>
                            <th scope="col" width="10%">วันที่</th>
                            <th scope="col" width="15%">รอบที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sum11=0;
                            $sum12=0;
                            $i=0;
                            foreach ($data11['user'] as $key => $value) {
                                $i++;
                                $sum11++;
                                $title=$data11["user"][$key]["title"];
                                $name=$data11["user"][$key]["name"];
                                $surname=$data11["user"][$key]["surname"];
                                $school=$data11["user"][$key]["school"];
                                $date="11 พ.ย. 2565";
                                $workshop="Physibot";
                                $round="รอบที่ 1 (13.00-14.00)";

                                echo "
                                    <tr class='bg-169'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                            $i=0;
                            foreach ($datatwo11['user'] as $key => $value) {
                                $i++;
                                $sum11++;
                                $title=$datatwo11["user"][$key]["title"];
                                $name=$datatwo11["user"][$key]["name"];
                                $surname=$datatwo11["user"][$key]["surname"];
                                $school=$datatwo11["user"][$key]["school"];
                                $date="11 พ.ย. 2565";
                                $workshop="Physibot";
                                $round="รอบที่ 2 (14.30-15.30)";

                                echo "
                                    <tr class='bg-202'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                            $i=0;
                            foreach ($data12['user'] as $key => $value) {
                                $i++;
                                $sum12++;
                                $title=$data12["user"][$key]["title"];
                                $name=$data12["user"][$key]["name"];
                                $surname=$data12["user"][$key]["surname"];
                                $school=$data12["user"][$key]["school"];
                                $date="12 พ.ย. 2565";
                                $workshop="Physibot";
                                $round="รอบที่ 1 (13.00-14.00)";

                                echo "
                                    <tr class='bg-147'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop สนุกกับการขึ้นรูปพลาสติก</h3>
            </div>
            <div class="card-body fs-18">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ที่</th>
                            <th scope="col" width="10%">คำนำหน้า</th>
                            <th scope="col" width="15%">ชื่อ</th>
                            <th scope="col" width="20%">นามสกุล</th>
                            <th scope="col" width="">กิจกรรม</th>
                            <th scope="col" width="10%">วันที่</th>
                            <th scope="col" width="15%">รอบที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $i=0;
                             foreach ($data21['user'] as $key => $value) {
                                 $i++;
                                 $sum11++;
                                 $title=$data21["user"][$key]["title"];
                                 $name=$data21["user"][$key]["name"];
                                 $surname=$data21["user"][$key]["surname"];
                                 $school=$data21["user"][$key]["school"];
                                 $date="11 พ.ย. 2565";
                                 $workshop="สนุกกับการขึ้นรูปพลาสติก";
                                 $round="รอบที่ 1 (13.00-14.00)";
 
                                 echo "
                                     <tr class='bg-169'>
                                         <th scope='row'>{$i}</th>
                                         <td>{$title}</td>
                                         <td>{$name}</td>
                                         <td>{$surname}</td>
                                         <td>{$workshop}</td>
                                         <td>{$date}</td>
                                         <td>{$round}</td>
                                     </tr>
                                 ";
                             }
                             $i=0;
                             foreach ($datatwo21['user'] as $key => $value) {
                                 $i++;
                                 $sum11++;
                                 $title=$datatwo21["user"][$key]["title"];
                                 $name=$datatwo21["user"][$key]["name"];
                                 $surname=$datatwo21["user"][$key]["surname"];
                                 $school=$datatwo21["user"][$key]["school"];
                                 $date="11 พ.ย. 2565";
                                 $workshop="สนุกกับการขึ้นรูปพลาสติก";
                                 $round="รอบที่ 2 (14.30-15.30)";
 
                                 echo "
                                     <tr class='bg-202'>
                                         <th scope='row'>{$i}</th>
                                         <td>{$title}</td>
                                         <td>{$name}</td>
                                         <td>{$surname}</td>
                                         <td>{$workshop}</td>
                                         <td>{$date}</td>
                                         <td>{$round}</td>
                                     </tr>
                                 ";
                             }
                             $i=0;
                             foreach ($data22['user'] as $key => $value) {
                                 $i++;
                                 $sum12++;
                                 $title=$data22["user"][$key]["title"];
                                 $name=$data22["user"][$key]["name"];
                                 $surname=$data22["user"][$key]["surname"];
                                 $school=$data22["user"][$key]["school"];
                                 $date="12 พ.ย. 2565";
                                 $workshop="สนุกกับการขึ้นรูปพลาสติก";
                                 $round="รอบที่ 1 (13.00-14.00)";
 
                                 echo "
                                     <tr class='bg-147'>
                                         <th scope='row'>{$i}</th>
                                         <td>{$title}</td>
                                         <td>{$name}</td>
                                         <td>{$surname}</td>
                                         <td>{$workshop}</td>
                                         <td>{$date}</td>
                                         <td>{$round}</td>
                                     </tr>
                                 ";
                             }
                             $i=0;
                             foreach ($datatwo22['user'] as $key => $value) {
                                 $i++;
                                 $sum12++;
                                 $title=$datatwo22["user"][$key]["title"];
                                 $name=$datatwo22["user"][$key]["name"];
                                 $surname=$datatwo22["user"][$key]["surname"];
                                 $school=$datatwo22["user"][$key]["school"];
                                 $date="12 พ.ย. 2565";
                                 $workshop="สนุกกับการขึ้นรูปพลาสติก";
                                 $round="รอบที่ 2 (14.30-15.30)";
 
                                 echo "
                                     <tr class='bg-257'>
                                         <th scope='row'>{$i}</th>
                                         <td>{$title}</td>
                                         <td>{$name}</td>
                                         <td>{$surname}</td>
                                         <td>{$workshop}</td>
                                         <td>{$date}</td>
                                         <td>{$round}</td>
                                     </tr>
                                 ";
                             }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop นักสืบติดดิน รอบที่ 1</h3>
            </div>
            <div class="card-body fs-18">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ที่</th>
                            <th scope="col" width="10%">คำนำหน้า</th>
                            <th scope="col" width="15%">ชื่อ</th>
                            <th scope="col" width="20%">นามสกุล</th>
                            <th scope="col" width="">กิจกรรม</th>
                            <th scope="col" width="10%">วันที่</th>
                            <th scope="col" width="15%">รอบที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $i=0;
                           foreach ($data31['user'] as $key => $value) {
                               $i++;
                               $sum11++;
                               $title=$data31["user"][$key]["title"];
                               $name=$data31["user"][$key]["name"];
                               $surname=$data31["user"][$key]["surname"];
                               $school=$data31["user"][$key]["school"];
                               $date="11 พ.ย. 2565";
                               $workshop="นักสืบติดดิน";
                               $round="รอบที่ 1 (13.00-14.00)";

                               echo "
                                   <tr class='bg-169'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($datatwo31['user'] as $key => $value) {
                               $i++;
                               $sum11++;
                               $title=$datatwo31["user"][$key]["title"];
                               $name=$datatwo31["user"][$key]["name"];
                               $surname=$datatwo31["user"][$key]["surname"];
                               $school=$datatwo31["user"][$key]["school"];
                               $date="11 พ.ย. 2565";
                               $workshop="นักสืบติดดิน";
                               $round="รอบที่ 2 (14.30-15.30)";

                               echo "
                                   <tr class='bg-202'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($data32['user'] as $key => $value) {
                               $i++;
                               $sum12++;
                               $title=$data32["user"][$key]["title"];
                               $name=$data32["user"][$key]["name"];
                               $surname=$data32["user"][$key]["surname"];
                               $school=$data32["user"][$key]["school"];
                               $date="12 พ.ย. 2565";
                               $workshop="นักสืบติดดิน";
                               $round="รอบที่ 1 (13.00-14.00)";

                               echo "
                                   <tr class='bg-147'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($datatwo32['user'] as $key => $value) {
                               $i++;
                               $sum12++;
                               $title=$datatwo32["user"][$key]["title"];
                               $name=$datatwo32["user"][$key]["name"];
                               $surname=$datatwo32["user"][$key]["surname"];
                               $school=$datatwo32["user"][$key]["school"];
                               $date="12 พ.ย. 2565";
                               $workshop="นักสืบติดดิน";
                               $round="รอบที่ 2 (14.30-15.30)";

                               echo "
                                   <tr class='bg-257'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop Data analyst Readiness รอบที่ 1</h3>
            </div>
            <div class="card-body fs-18">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ที่</th>
                            <th scope="col" width="10%">คำนำหน้า</th>
                            <th scope="col" width="15%">ชื่อ</th>
                            <th scope="col" width="20%">นามสกุล</th>
                            <th scope="col" width="">กิจกรรม</th>
                            <th scope="col" width="10%">วันที่</th>
                            <th scope="col" width="15%">รอบที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            foreach ($data41['user'] as $key => $value) {
                                $i++;
                                $sum11++;
                                $title=$data41["user"][$key]["title"];
                                $name=$data41["user"][$key]["name"];
                                $surname=$data41["user"][$key]["surname"];
                                $school=$data41["user"][$key]["school"];
                                $date="11 พ.ย. 2565";
                                $workshop="Data analyst Readiness";
                                $round="รอบที่ 1 (13.00-14.00)";

                                echo "
                                    <tr class='bg-169'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                            $i=0;
                            foreach ($datatwo41['user'] as $key => $value) {
                                $i++;
                                $sum11++;
                                $title=$datatwo41["user"][$key]["title"];
                                $name=$datatwo41["user"][$key]["name"];
                                $surname=$datatwo41["user"][$key]["surname"];
                                $school=$datatwo41["user"][$key]["school"];
                                $date="11 พ.ย. 2565";
                                $workshop="Data analyst Readiness";
                                $round="รอบที่ 2 (14.30-15.30)";

                                echo "
                                    <tr class='bg-202'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                            $i=0;
                            foreach ($data42['user'] as $key => $value) {
                                $i++;
                                $sum12++;
                                $title=$data42["user"][$key]["title"];
                                $name=$data42["user"][$key]["name"];
                                $surname=$data42["user"][$key]["surname"];
                                $school=$data42["user"][$key]["school"];
                                $date="12 พ.ย. 2565";
                                $workshop="Data analyst Readiness";
                                $round="รอบที่ 1 (13.00-14.00)";

                                echo "
                                    <tr class='bg-147'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                            $i=0;
                            foreach ($datatwo42['user'] as $key => $value) {
                                $i++;
                                $sum12++;
                                $title=$datatwo42["user"][$key]["title"];
                                $name=$datatwo42["user"][$key]["name"];
                                $surname=$datatwo42["user"][$key]["surname"];
                                $school=$datatwo42["user"][$key]["school"];
                                $date="12 พ.ย. 2565";
                                $workshop="Data analyst Readiness";
                                $round="รอบที่ 2 (14.30-15.30)";

                                echo "
                                    <tr class='bg-257'>
                                        <th scope='row'>{$i}</th>
                                        <td>{$title}</td>
                                        <td>{$name}</td>
                                        <td>{$surname}</td>
                                        <td>{$workshop}</td>
                                        <td>{$date}</td>
                                        <td>{$round}</td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า รอบที่ 1</h3>
            </div>
            <div class="card-body fs-18">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ที่</th>
                            <th scope="col" width="10%">คำนำหน้า</th>
                            <th scope="col" width="15%">ชื่อ</th>
                            <th scope="col" width="20%">นามสกุล</th>
                            <th scope="col" width="">กิจกรรม</th>
                            <th scope="col" width="10%">วันที่</th>
                            <th scope="col" width="15%">รอบที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $i=0;
                           foreach ($data51['user'] as $key => $value) {
                               $i++;
                               $sum11++;
                               $title=$data51["user"][$key]["title"];
                               $name=$data51["user"][$key]["name"];
                               $surname=$data51["user"][$key]["surname"];
                               $school=$data51["user"][$key]["school"];
                               $date="11 พ.ย. 2565";
                               $workshop="DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า";
                               $round="รอบที่ 1 (13.00-14.00)";

                               echo "
                                   <tr class='bg-169'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($datatwo51['user'] as $key => $value) {
                               $i++;
                               $sum11++;
                               $title=$datatwo51["user"][$key]["title"];
                               $name=$datatwo51["user"][$key]["name"];
                               $surname=$datatwo51["user"][$key]["surname"];
                               $school=$datatwo51["user"][$key]["school"];
                               $date="11 พ.ย. 2565";
                               $workshop="DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า";
                               $round="รอบที่ 2 (14.30-15.30)";

                               echo "
                                   <tr class='bg-202'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($data52['user'] as $key => $value) {
                               $i++;
                               $sum12++;
                               $title=$data52["user"][$key]["title"];
                               $name=$data52["user"][$key]["name"];
                               $surname=$data52["user"][$key]["surname"];
                               $school=$data52["user"][$key]["school"];
                               $date="12 พ.ย. 2565";
                               $workshop="DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า";
                               $round="รอบที่ 1 (13.00-14.00)";

                               echo "
                                   <tr class='bg-147'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($datatwo52['user'] as $key => $value) {
                               $i++;
                               $sum12++;
                               $title=$datatwo52["user"][$key]["title"];
                               $name=$datatwo52["user"][$key]["name"];
                               $surname=$datatwo52["user"][$key]["surname"];
                               $school=$datatwo52["user"][$key]["school"];
                               $date="12 พ.ย. 2565";
                               $workshop="DIY เมนูง่ายๆจากสาหร่ายสไปลูริน่า";
                               $round="รอบที่ 2 (14.30-15.30)";

                               echo "
                                   <tr class='bg-257'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card fs-24 shadow">
            <div class="card-header bg-130 text-white">
                <h3>จำนวนผู้ลงทะเบียน Workshop micro:bit รอบที่ 1</h3>
            </div>
            <div class="card-body fs-18">
                <table class="table  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ที่</th>
                            <th scope="col" width="10%">คำนำหน้า</th>
                            <th scope="col" width="15%">ชื่อ</th>
                            <th scope="col" width="20%">นามสกุล</th>
                            <th scope="col" width="">กิจกรรม</th>
                            <th scope="col" width="10%">วันที่</th>
                            <th scope="col" width="15%">รอบที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $i=0;
                           foreach ($data61['user'] as $key => $value) {
                               $i++;
                               $sum11++;
                               $title=$data61["user"][$key]["title"];
                               $name=$data61["user"][$key]["name"];
                               $surname=$data61["user"][$key]["surname"];
                               $school=$data61["user"][$key]["school"];
                               $date="11 พ.ย. 2565";
                               $workshop="micro:bit";
                               $round="รอบที่ 1 (13.00-14.00)";

                               echo "
                                   <tr class='bg-169'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($datatwo61['user'] as $key => $value) {
                               $i++;
                               $sum11++;
                               $title=$datatwo61["user"][$key]["title"];
                               $name=$datatwo61["user"][$key]["name"];
                               $surname=$datatwo61["user"][$key]["surname"];
                               $school=$datatwo61["user"][$key]["school"];
                               $date="11 พ.ย. 2565";
                               $workshop="micro:bit";
                               $round="รอบที่ 2 (14.30-15.30)";

                               echo "
                                   <tr class='bg-202'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($data62['user'] as $key => $value) {
                               $i++;
                               $sum12++;
                               $title=$data62["user"][$key]["title"];
                               $name=$data62["user"][$key]["name"];
                               $surname=$data62["user"][$key]["surname"];
                               $school=$data62["user"][$key]["school"];
                               $date="12 พ.ย. 2565";
                               $workshop="micro:bit";
                               $round="รอบที่ 1 (13.00-14.00)";

                               echo "
                                   <tr class='bg-147'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                           $i=0;
                           foreach ($datatwo62['user'] as $key => $value) {
                               $i++;
                               $sum12++;
                               $title=$datatwo62["user"][$key]["title"];
                               $name=$datatwo62["user"][$key]["name"];
                               $surname=$datatwo62["user"][$key]["surname"];
                               $school=$datatwo62["user"][$key]["school"];
                               $date="12 พ.ย. 2565";
                               $workshop="micro:bit";
                               $round="รอบที่ 2 (14.30-15.30)";

                               echo "
                                   <tr class='bg-257'>
                                       <th scope='row'>{$i}</th>
                                       <td>{$title}</td>
                                       <td>{$name}</td>
                                       <td>{$surname}</td>
                                       <td>{$workshop}</td>
                                       <td>{$date}</td>
                                       <td>{$round}</td>
                                   </tr>
                               ";
                           }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="alert alert-primary" role="alert">
            <p>
                สรุปวันที่ <?php echo date("d/m/Y H:i:s");?><br>
                วันที่ 11 พ.ย. 2565 รวมจำนวน  <?php echo $sum11;?> คน <br>
                วันที่ 12 พ.ย. 2565 รวมจำนวน  <?php echo $sum12;?> คน
            
            </p>
        </div>
        
        <br>

    
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