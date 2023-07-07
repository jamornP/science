<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/vendor/autoload.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/count_google_sciday2023.php"; ?>
<?php
session_start();
use App\Model\Sciday2023\Auth;
$authObj = new Auth;
use App\Model\Sciday2023\Admin;
$adminObj = new Admin;
date_default_timezone_set('Asia/Bangkok');


if(isset($_SESSION['user_id'])){
    $bt_register =true;
}else{
    $bt_register =false;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-177">
    <div class="container-fluid">
        <a class="navbar-brand font-sriracha" href="/science/sciday/2023">Science Day 2023</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/science/sciday/2023">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link active" href="/science/sciday/2023/pages/activity" aria-current="page">
                        กิจกรรมประกวดแข่งขัน
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="http://www.it.science.kmitl.ac.th/workshop/path.php" aria-current="page">
                        กิจกรรมWorkshop
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#">ดาวน์โหลด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">คู่มือ</a>
                </li> -->

            </ul>
            <div class="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
               if (isset($_SESSION['login'])) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['fullname']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php
                                if($_SESSION['role']=="superadmin"){
                                    echo "
                                    <li><a class='dropdown-item' href='/science/sciday/2023/pages/admin/count.php'>สรุปยอด</a></li>
                                    <li><a class='dropdown-item' href='/science/sciday/2023/backend'>จัดการระบบ</a></li>
                                    <li><a class='dropdown-item' href='/science/sciday/2023/pages/com'>ข้อมูลทีมสมัคร</a></li>
                                    <li><a class='dropdown-item' href='/science/sciday/2023/pages/admin'>กรอกคะแนนและคัดเลือกทีม</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    ";
                                }
                                if($_SESSION['role']=="admin"){
                                    echo "
                                    <li><a class='dropdown-item' href='/science/sciday/2023/pages/admin'>ให้คะแนนและคัดเลือกทีม</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    ";
                                }
                                if($_SESSION['role']=="com"){
                                    echo "
                                    <li><a class='dropdown-item' href='/science/sciday/2023/pages/com'>ข้อมูลทีมสมัคร</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    ";
                                }
                            ?>
                            <?php 
                                if($_SESSION['role']=="member"){
                                    echo "
                                        <li><a class='dropdown-item' href='/science/sciday/2023/pages/member'>ข้อมูลการสมัคร</a></li>
                                        <li><hr class='dropdown-divider'></li>
                                    ";
                                }
                            ?>
                            
                            <li><a class="dropdown-item text-center" href="/science/sciday/2023/pages/auth/logout.php">Sign out</a></li>
                        </ul>
                    </li>
                    
                <?php
                } else {
                ?>

                    <a class="nav-link text-white" href="/science/sciday/2023/pages/auth/register.php"><i class='bx bx-registered'></i> ลงทะเบียน</a>
                    <div class="vr"></div>
                    <a class="nav-link text-white" href="/science/sciday/2023/pages/auth/login.php"><i class='bx bx-user-circle'></i> เข้าสู่ระบบ</a>
                <?php
                }
                ?>
            </ul>
            </div>
        </div>
    </div>
</nav>
