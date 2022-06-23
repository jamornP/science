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
                <a href="" class="btn btn-lg btn-outline-success my-bottom"><span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span> สมัครแข่งขัน</a>
            </div>
        
            <figure class="">
            <div class="row">
                    <div class="col-md-6 ">
                        <div class="mt-3 shadow">
                            <!-- coming soon... -->
                            <img src="/science/sciday/images/5.png" class="img-thumbnail rounded " alt="...">
                        </div>
                    </div>
                    <div class="col-md ">
                        <blockquote class="blockquote">
                            <h4 class="mt-3"><b>กำหนดการ</b></h4>
                        </blockquote>
                        <!-- <img src="/science/sciday/images/comingsoon.jpg" class="img-thumbnail rounded " alt="..."> -->
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
                                            - เอกสารหลักเกณฑ์การแข่งขัน <a href="/science/sciday/document/esports/หลักเกณฑ์และกติกาการแข่งขัน Science KMITL VALORANT Tournament 2022.docx" class="btn btn-sm btn-warning text-white mt-1" target='_blank'>Download</a>
                                            <br>
                                            - ผ่านช่องทาง  <a href="" class="">https://forms.gle/Xfras1qJG1p3U8B1A</a>
                                        </td>
                                        <td class="text-center">
                                            วันที่ 22 มิ.ย. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-danger fs-20 shadow">ปิดระบบรับสมัคร</span> <br>
                                            - เวลา 23.59 น.
                                        </td>
                                        <td class="text-center">
                                            วันที่ 29  ก.ค. 2565
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">ประกาศรายชื่อผู้มีสิทธิ์แข่งขัน</span> <br>
                                            - ผ่านช่องทาง  <a href="https://challonge.com/scikmitl_valorant_2022" class="">https://challonge.com/scikmitl_valorant_2022</a> 
                                        </td>
                                        <td class="text-center">
                                            วันที่ 13 ส.ค. 2565
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <span class="badge rounded-pill bg-primary fs-20 shadow">แข่งขัน</span> <br>
                                            วันเสาร์ที่ 13 สิงหาคม 2565 เวลา 19.00 น.<br>
                                            วันอาทิตย์ที่ 14 สิงหาคม 2565 เวลา 19.00 น.<br>
                                            วันเสาร์ที่ 20 สิงหาคม 2565 เวลา 19.00 น.<br>
                                            วันอาทิตย์ที่ 21 สิงหาคม 2565 เวลา 19.00 น.<br>
                                            วันอังคารที่ 23 สิงหาคม <br>เวลา 10.00 น. การแข่งขันรอบ 8 ทีม <br> เวลา 13.00 น การแข่งขันรอบ 4 ทีม (BO3)<br>
                                            วันพุธที่ 24 สิงหาคม <br>เวลา 10.00 น การแข่งขันชิงที่ 3 <br>และการแข่งขันรอบชิงชนะเลิศ (BO3)

                                        </td>
                                        <td class="text-center">
                                            วันที่ 13 - 24 ส.ค. 2565
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