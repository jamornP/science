<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
 use App\Model\Sciday\Activity;
 $activityObj = new Activity;  
 session_start(); 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning fs-24" style="height: 80px;">
    <div class="container-fluid" >
        <a class="navbar-brand fs-28" href="#"><i class='bx bx-planet'></i> Science Day&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-warning" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/science/sciday/pages/"><i class='bx bx-home-circle' ></i> หน้าหลัก</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-edit-alt'></i> กิจกรรม
                    </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown">
                        <?php 
                            $activitys = $activityObj->getActivityByYear('2022');
                            foreach($activitys as $activity){
                                if($_SESSION['role']==''){
                                    echo "
                                    <li><a class='dropdown-item fs-18' href='{$activity['link']}?activity={$activity['id']}'><i class='bx bx-chevron-right-circle' ></i> {$activity['name']}</a></li>
                                ";
                                }elseif($_SESSION['role']=='committee' OR $_SESSION['role']=='chairman'){

                                    echo "
                                        <li><a class='dropdown-item fs-18' href='{$activity['backend']}?activity={$activity['id']}'><i class='bx bx-chevron-right-circle' ></i> {$activity['name']}</a></li>
                                    ";
                                }
                            }
                        ?>
                        
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-edit-alt'></i> ทีมที่สมัคร
                    </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown">
                        <li><a class='dropdown-item fs-18' href='/science/sciday/project/admin.php?activity=2'><i class='bx bx-chevron-right-circle' ></i> การประกวดสิ่งประดิษฐ์</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <?php if($_SESSION['login']){?>
                    
                        
                            <a class="nav-link dropdown-toggle active text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['name']." ".$_SESSION['surname'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">แก้ไขข้อมูลส่วนตัว</a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="/science/sciday/auth/logout.php">ออกจากระบบ</a>
                            </div>
                       
                   
                <?php }else{?>
                    <a class="nav-link text-white" href="/science/sciday/auth/register.php"><i class='bx bx-registered' ></i> ลงทะเบียน</a>
                    <div class="vr"></div>
                    <a class="nav-link text-white" href="/science/sciday/auth/login.php"><i class='bx bx-user-circle'></i> เข้าสู่ระบบ</a>
                <?php }?>
            </div>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>