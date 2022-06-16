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
        <div class="d-flex justify-content-between ">
            <span class="badge rounded-pill bg-warning mt-3 shadow text-truncate">
                <h2><b>&nbsp;&nbsp;&nbsp;<?php echo $activity_name;?>&nbsp;&nbsp;&nbsp;</b></h2>
            </span>
           
        </div>
        
        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-3">
            <div class="d-flex flex-row-reverse bd-highlight">
                <a href="../answer/form.php?activity=<?php echo $_REQUEST['activity'];?>" class="btn btn-lg btn-outline-success my-bottom">
                <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span> ยื่นใบสมัครแข่งขัน</a>
            </div>
        
            <figure class="">
            <div class="row">
                    <div class="col-md-6">
                        <div class="mt-3 shadow">
                            <!-- coming soon... -->
                            <img src="/science/sciday/images/4.png" class="img-thumbnail rounded " alt="...">
                        </div>
                    </div>
                    <div class="col-md">
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
                                            - เอกสารหลักเกณฑ์การประกวด <a href="/science/sciday/document/answer/รายละเอียด การแข่งขันตอบปัญหาฯภาษาไทย.pdf" class="btn btn-sm btn-warning text-white mt-1" target='_blank'>ภาษาไทย </a>
                                            <a href="/science/sciday/document/answer/รายละเอียด การแข่งขันตอบปัญหาฯ(ภาษาอังกฤษ).pdf" class="btn btn-sm btn-warning text-white mt-1" target='_blank'>English </a><br>
                                            - ใบสมัคร <br><a href="/science/sciday/document/answer/ใบสมัคร การแข่งขันตอบปัญหาฯภาษาไทย.pdf" class="btn btn-sm btn-warning text-white mt-1" target='_blank'><i class='bx bxs-file-pdf'></i> pdf ภาษาไทย</a>
                                            <a href="/science/sciday/document/answer/ใบสมัคร การแข่งขันตอบปัญหาฯภาษาไทย.docx" class=" btn btn-sm btn-warning text-white mt-1" target='_blank'><i class='bx bxs-file-doc'></i> word ภาษาไทย</a>
                                            <br><a href="/science/sciday/document/answer/ใบสมัคร การแข่งขันตอบปัญหาฯ(ภาษาอังกฤษ).pdf" class="btn btn-sm btn-warning text-white mt-1" target='_blank'><i class='bx bxs-file-pdf'></i> pdf English </a>
                                            &nbsp;<a href="/science/sciday/document/answer/ใบสมัคร การแข่งขันตอบปัญหาฯ(ภาษาอังกฤษ).docx" class=" btn btn-sm btn-warning text-white mt-1" target='_blank'><i class='bx bxs-file-doc'></i> word English</a>
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
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ประกาศรายชื่อผู้ผ่านการคัดเลือก</span> <br>
                                            - ผ่านช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> หรือ <a href=""></a>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 19 ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">จัดการแข่งขันรอบคัดเลือกแบบออนไลน์</span> <br>
                                            - ภาษาอังกฤษ เริ่มแข่งขันเวลา 9.00 น. <br>
                                            - ภาษาไทย เริ่มแข่งขันเวลา 10.30 น. <br>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 9 ส.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ประกาศรายชื่อผู้ผ่านเข้ารอบตัดสิน</span> <br>
                                            - ผ่านช่องทาง --> <a href="" class="">http://sciday.kmitl.ac.th</a> หรือ <a href=""></a>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 11 ส.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">การแข่งขันรอบตัดสิน</span> <br>
                                            - ภาษาอังกฤษ เริ่มแข่งขันเวลา 9.00 น. ณ หอประชุมจุฬาภรณวลัยลักษณ์ ชั้น 2<br>
                                            - ภาษาไทย เริ่มแข่งขันเวลา 10.30 น. ณ หอประชุมจุฬาภรณวลัยลักษณ์ ชั้น 2<br>
                                            <!-- - เวลา 10.00 - 10.15 น. ลงทะเบียน ณ หอประชุมจุฬาภรณวลัยลักษณ์ ชั้น 2 <br>
                                            - เวลา 10.30 น. เริ่มการแข่งขัน <br> -->
                                            <!-- - เวลา 13.00 น กรรมการประชุมตัดสินผู้ได้รับรางวัล <br> -->
                                            <!-- - เวลา 15.30 น ประกาศผลและรับรางวัล <br> -->
                                        </td>
                                        <td class="text-center">
                                            วันที่ 24 ส.ค. 2565
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