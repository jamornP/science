<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity;  
 use App\Model\Sciday\Level;
 $levelObj = new Level;  
 use App\Model\Sciday\Project;
 $projectObj = new Project;  
 use App\Model\Sciday\Answer;
 $answerObj = new Answer;  
 use App\Model\Sciday\Artifact;
 $artifactObj = new Artifact;  
 use App\Model\Sciday\Iot;
 $iotObj = new Iot;  
 use App\Model\Sciday\Esports;
 $esportsObj = new Esports;  
 use App\Model\Sciday\Micro;
 $microObj = new Micro;  
 session_start(); 
 
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark fs-24" style="height: 80px; background-color:rgb(2,29,75);">
    <div class="container-fluid" >
        <a class="navbar-brand fs-28" href="/science/sciday/pages/"><i class='bx bx-planet'></i> Science Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation" style="--bs-scroll-height: 100px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"  id="navbarScroll" style="background-color:rgb(2,29,75);">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 400px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/science/sciday/pages/"><i class='bx bx-home-circle' ></i> หน้าหลัก</a>
                </li>
                <!-- $_SESSION['role']=='member' OR $_SESSION['role']=='chairman' -->
                <?php if($_SESSION['role']=='member' OR $_SESSION['role']=='chairman' OR 1==1){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-edit-alt'></i> กิจกรรม
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown" style="background-color:rgb(233,152,20);">
                            <?php 
                                $activitys = $activityObj->getActivityByYear('2022');
                                foreach($activitys as $activity){
                                    $activitty = base64_encode($activity['id']);
                                    echo "
                                        <li><a class='dropdown-item fs-18' href='{$activity['link']}?activity={$activitty}'><i class='bx bx-chevron-right-circle' ></i> {$activity['name']}</a></li>
                                    ";
                                }
                            ?>
                        </ul>
                    </li>
                <?php } ?> 
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/science/sciday/document/ขั้นตอนการสมัครกิจกรรมวันวิทยาศาสตร์.pdf" target='_blank'><i class='bx bx-user-voice' ></i> คู่มือการสมัคร</a>
                </li>
                <?php if($_SESSION['role']=='committee' OR $_SESSION['role']=='chairman'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-group' ></i> ทีมที่สมัคร <?php //echo $_SESSION['activity'];?>
                    </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown" style="background-color:rgb(233,152,20);">
                        <?php
                        $activityByLink = $activityObj->getActivityById($_SESSION['activity']);
                        $levels = $levelObj->getLevelByActivity ($_SESSION['activity']);
                        foreach($levels AS $level){
                            $level_id= base64_encode($level['id']);
                            echo "
                                <li><a class='dropdown-item fs-18' href='{$activityByLink['committee']}?level={$level_id}'><i class='bx bx-chevron-right-circle' ></i> {$level['name']}</a></li
                            ";
                        }
                        ?>
                        >
                    </ul>
                </li>
                <?php } ?>
                <?php if($_SESSION['role']=='chairman'){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-user-check' ></i> จัดการผลการแข่งขัน
                    </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown" style="background-color:rgb(233,152,20);">
                        <?php
                        $activityByLink = $activityObj->getActivityById($_SESSION['activity']);
                        $levels = $levelObj->getLevelByActivity ($_SESSION['activity']);
                        foreach($levels AS $level){
                            $level_id= base64_encode($level['id']);
                            echo "
                                <li><a class='dropdown-item fs-18' href='{$activityByLink['admin']}?level={$level_id}'><i class='bx bx-chevron-right-circle' ></i> {$level['name']}</a></li
                            ";
                        }
                        ?>
                        >
                    </ul>
                </li>
                <?php } ?>
            </ul>
            <div class="d-flex">
                <?php if($_SESSION['login']){?>
                    <a class="nav-link dropdown-toggle active text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['name']." ".$_SESSION['surname']." (".$_SESSION['role'].")" ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown" style="background-color:rgb(96,168,197);"  >
                        <span class='badge rounded-pill bg-warning fs-18'> แก้ไขข้อมูล </span>
                        <hr class="dropdown-divider">
                        <?php 
                            $activitys = $activityObj->getActivityByYear('2022');
                            foreach($activitys AS $activity){
                                
                                switch ($activity['id']) {
                                    case 1:
                                        $artifacts = $artifactObj->getArtifactByUser($_SESSION['user_id']);
                                        if(count($artifacts)>0){
                                            echo "
                                            <span class='badge rounded-pill bg-primary fs-16'> {$activity['name']}</span>
                                            ";
                                            
                                            foreach($artifacts AS $artifact){
                                                $artifact_id = base64_encode($artifact['id']);
                                                $activity_id = base64_encode(1);
                                                echo "
                                                    <a class='dropdown-item' href='/science/sciday/artifact/member.php?artifact_id={$artifact_id}'><i class='bx bx-right-arrow-alt' ></i> {$artifact['artifact_name']}</a>
                                                ";
                                            }
                                        }
                                        break;
                                    case 2:
                                        $pros = $projectObj->getProjectByUser($_SESSION['user_id']);
                                        if(count($pros)>0){
                                            echo "
                                            <span class='badge rounded-pill bg-primary fs-16'> {$activity['name']}</span>
                                            ";
                                            foreach($pros AS $pro){
                                                $pro_id = base64_encode($pro['id']);
                                                $activity_id = base64_encode(2);
                                                echo "
                                                    <a class='dropdown-item' href='/science/sciday/project/member.php?project_id={$pro_id}'><i class='bx bx-right-arrow-alt' ></i> {$pro['project_name']}</a>
                                                ";
                                            }
                                        }
                                        break;
                                    case 3:
                                        $iots = $iotObj->getIotByUser($_SESSION['user_id']);
                                        if(count($iots)>0){
                                            echo "
                                                <span class='badge rounded-pill bg-primary fs-16'> {$activity['name']}</span>
                                            ";
                                            foreach($iots AS $iot){
                                                $pro_id = base64_encode($iot['id']);
                                                $activity_id = base64_encode(3);
                                                echo "
                                                    <a class='dropdown-item' href='/science/sciday/iot/member.php?iot_id={$pro_id}'><i class='bx bx-right-arrow-alt' ></i> {$iot['iot_name']}</a>
                                                ";
                                            }
                                        }
                                        break;
                                    case 4:
                                        $answers = $answerObj->getAnswerByUser($_SESSION['user_id']);
                                        if(count($answers)>0){
                                            echo "
                                            <span class='badge rounded-pill bg-primary fs-16'> {$activity['name']}</span>
                                            ";
                                            foreach($answers AS $answer){
                                                $answer_id = base64_encode($answer['id']);
                                                $activity_id = base64_encode(4);
                                                echo "
                                                    <a class='dropdown-item' href='/science/sciday/answer/member.php?answer_id={$answer_id}'><i class='bx bx-right-arrow-alt' ></i> {$answer['level']}</a>
                                                ";
                                            }
                                        }
                                        break;

                                    case 5:
                                        $esportss = $esportsObj->getEsportsByUser($_SESSION['user_id']);
                                        if(count($esportss)>0){
                                            echo "
                                            <span class='badge rounded-pill bg-primary fs-16'> {$activity['name']}</span>
                                            ";
                                            foreach($esportss AS $esports){
                                                $esports_id = base64_encode($esports['id']);
                                                $activity_id = base64_encode(5);
                                                echo "
                                                    <a class='dropdown-item' href='/science/sciday/esports/member.php?esports_id={$esports_id}'><i class='bx bx-right-arrow-alt' ></i> {$esports['team']}</a>
                                                ";
                                            }
                                        }
                                        
                                        break;
                                    case 6:
                                        $micros = $microObj->getMicroByUser($_SESSION['user_id']);
                                        if(count($micros)>0){
                                            echo "
                                            <span class='badge rounded-pill bg-primary fs-16'> {$activity['name']}</span>
                                            ";
                                            foreach($micros AS $micro){
                                                $micro_id = base64_encode($micro['id']);
                                                $activity_id = base64_encode(6);
                                                echo "
                                                    <a class='dropdown-item' href='/science/sciday/micro/member.php?micro_id={$micro_id}'><i class='bx bx-right-arrow-alt' ></i> {$micro['micro_name']}</a>
                                                ";
                                            }
                                        }
                                        break;
                                    default:
                                }
                            }
                        ?>
                        <!-- </ul> -->
                        <?php  
                            if($_SESSION['role']=='admin'){
                                echo "
                                    <a class='dropdown-item' href='/science/sciday/pages/declaration.php'>ประกาศผล</a>
                                    <a class='dropdown-item' href='/science/sciday/pages/all.php'>สรุปทีมที่สมัครทุกกิจกรรม</a>
                                ";
                            }elseif($_SESSION['role']=='chairman'){
                                echo "
                                    <a class='dropdown-item' href='/science/sciday/pages/all.php'>สรุปทีมที่สมัครทุกกิจกรรม</a>
                                ";
                            }
                            
                            
                        ?>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="/science/sciday/auth/logout.php">ออกจากระบบ</a>
                    </div>
                
            
                    <?php 
                    }else{?>
                    <a class="nav-link text-white" href="/science/sciday/auth/register.php"><i class='bx bx-registered' ></i> ลงทะเบียน</a>
                    <div class="vr"></div>
                    <a class="nav-link text-white" href="/science/sciday/auth/login.php"><i class='bx bx-user-circle'></i> เข้าสู่ระบบ</a>
                <?php }?>
            </div>
            
        </div>
    </div>
</nav>