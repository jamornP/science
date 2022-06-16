<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity; 
 $activitys = $activityObj->getActivityById(base64_decode($_REQUEST['activity']));
 $activity_name = $activitys['name'];
 use App\Model\Sciday\Project;
 $projectObj = new Project;   
 use App\Model\Sciday\Title;
 $titleObj = new Title;   
 use App\Model\Sciday\Level;
 $levelObj = new Level;   
 use App\Model\Sciday\Round;
 $roundObj = new Round;
 use App\Model\Sciday\Student;
 $studentObj = new Student;  
use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;   
 use App\Model\Sciday\Showround;
 $showroundObj = new Showround; 
?>
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
    <div class="container">
        <!-- <h1 class="mt-3"><b>กิจกรรมงานวันวิทยาศาสตร์ 2022</span></b></h1> -->
    </div>
    
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
           
        </div>
        
        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3">
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="../iot/form.php?activity=<?php echo $_REQUEST['activity'];?>" class="btn btn-lg btn-outline-success my-bottom"><span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span> สมัครแข่งขัน</a>
            </div>
        
            <figure class="">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="mt-3 shadow">
                            <!-- coming soon... -->
                            <img src="/science/sciday/images/3.png" class="img-thumbnail rounded " alt="...">
                        </div>
                    </div>
                    <div class="col-md table-responsive">
                        <blockquote class="blockquote">
                            <h4 class="mt-3"><b>กำหนดการ</b></h4>
                        </blockquote>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover table-success shadow">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th width='70%'>รายละเอียด</th>
                                        <th width='30%'>วันที่</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">เปิดระบบรับสมัคร</span> <br>
                                            - เอกสารหลักเกณฑ์การประกวด <a href="/science/sciday/document/iot/1.รายละเอียดและใบสมัครการประกวดโครงงาน IoT.pdf" class="btn btn-sm btn-warning text-white mt-1" target='_blank'>Download </a><br>
                                            - ใบสมัคร <a href="/science/sciday/document/iot/2.ใบสมัครIot.pdf" class="btn btn-sm btn-warning text-white p-1" target='_blank'><i class='bx bxs-file-pdf'></i> pdf</a>
                                            &nbsp;<a href="/science/sciday/document/iot/2.ใบสมัครIot.docx" class=" btn btn-sm btn-warning text-white p-1" target='_blank'><i class='bx bxs-file-doc'></i> word</a>
                                            <br>
                                            กรอกใบสมัครแล้วยื่นสมัครทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> หรือ <a href="" target='_blank'></a><br>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 15 มิ.ย. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-danger fs-20 shadow">ปิดระบบรับสมัคร</span> <br>
                                            - เวลา 23.59 น.
                                        </td>
                                        <td class="text-center">
                                            วันที่ 12  ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ประกาศรายชื่อผู้มีสิทธิ์ส่งคลิปวีดีโอเข้าประกวด</span> <br>
                                            - ผ่านช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> หรือ <a href=""></a>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 19 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">เปิดระบบแนบ Link video</span> <br>
                                            - สำหรับทีมที่ผ่านเข้ารอบที่ 2 ให้ผู้สมัครอัพคลิปลง Youtube แล้วส่งลิงค์เข้า ระบบของคณะ ที่ช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> หรือ <a href=""></a>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 20 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-danger fs-20 shadow">ปิดระบบแนบ Link video</span> <br>
                                            - เวลา 23.59 น.
                                        </td>
                                        <td class="text-center">
                                            วันที่ 27 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ส่งไฟล์รูปแบบ PDF และ PPTX </span> <br>
                                            - ที่ใช้ในการนำเสนอผลงานผ่านช่องทางงไปรษณีย์อิเล็กทรอนิกส์ --> <a href="mailto:nisachon.si@kmitl.ac.th" class="">nisachon.si@kmitl.ac.th </a> 
                                        </td>
                                        <td class="text-center">
                                            วันที่ 16 - 19 ส.ค. 2565 
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">การประกวดรอบตัดสิน</span> <br>
                                            - เวลา 9.30 น. เข้าร่วมพิธีเปิดงานที่หอประชุมจุฬาภรณวลัยลักษณ์ ชั้น 2<br>
                                            - เวลา 11.00 น. ผู้สมัครนำเสนอผลงานต่อกรรมการ <br>
                                            <!-- - เวลา 13.00 น กรรมการประชุมตัดสินผู้ได้รับรางวัล <br> -->
                                            - เวลา 15.30 น. ประกาศผลและรับรางวัล <br>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 23 ส.ค. 2565
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </figure>
        </div>
        
        
    </div>
</body>
</html>