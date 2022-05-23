<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
 use App\Model\Activity;
 $activityObj = new Activity;   
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-edit-alt'></i> กิจกรรม
            </a>
                    <ul class="dropdown-menu bg-warning " aria-labelledby="navbarScrollingDropdown">
                        <?php 
                            $activitys = $activityObj->getActivityByYear('2022');
                            foreach($activitys as $activity){
                                echo "
                                    <li><a class='dropdown-item fs-18' href='{$activity['link']}'><i class='bx bx-chevron-right-circle' ></i> {$activity['name']}</a></li>
                                ";
                            }
                        ?>
                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled">Link</a>
                </li> -->
            </ul>
            <div class="d-flex">

            </div>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>