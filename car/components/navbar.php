<nav class="navbar navbar-expand-lg navbar-dark bg-primary align-items-center">
  <div class="container-fluid align-items-center">
  
    <a class="navbar-brand " href="#">
    <i class='bx bx-car'></i> ระบบจองรถ คณะวิทยาศาสตร์
        
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/car/index.php">ปฏิทินการใช้รถ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/car/pages/member/form.php">แบบฟอร์มขอใช้รถ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/car/pages/member/index.php">ข้อมูลขอใช้รถทั้งหมด</a>
        </li>
       
        <?php
        if($_SESSION['role']=='admin'){
          echo "
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                จัดการข้อมูลระบบ
              </a>
              <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                <li><a class='dropdown-item' href='/car/pages/book/index.php'>ข้อมูลการจองรถ</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='/car/pages/car/index.php'>ข้อมูลรถ</a></li>
                <li><a class='dropdown-item' href='/car/pages/status/index.php'>ข้อมูลสถานะ</a></li>
                <li><a class='dropdown-item' href='/car/pages/position/index.php'>ข้อมูลตำแหน่ง</a></li>
                <li><a class='dropdown-item' href='/car/pages/department/index.php'>ข้อมูลสังกัด</a></li>
                <li><a class='dropdown-item' href='/car/pages/choose/index.php'>ข้อมูลการรับส่ง</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='/car/pages/user'>ข้อมูลสมาชิก</a></li>
              </ul>
            </li>
          ";
        }
        ?>  
      </ul>
      <div class="">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php 
        if($_SESSION['login']){
          $name=$_SESSION['name']." ".$_SESSION['surname']." (".$_SESSION['role'].") ";
          echo "
            <li class='nav-item dropdown ml-auto '>
              <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                {$name}
              </a>
              <div class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                <a class='dropdown-item' href='/car/pages/user/form.php?id={$_SESSION['id']}&action=edit'>แก้ไขข้อมูลส่วนตัว</a>
                <hr class='dropdown-divider'>
                <a class='dropdown-item' href='/car/pages/auth/logout.php'>ออกจากระบบ</a>
              </div>
            </li>
          ";
        }else {
          echo "
            <li class='nav-item '>
              <a href='/car/pages/auth/login.php'class='nav-link active'>เข้าสู่ระบบ</a>
            </li>
          ";
        }
        ?>
        
        
        <!-- <li class="nav-item">
          <a href="/car/pages/auth/register.php"class="nav-link active">ลงทะเบียน</a>
        </li> -->
      </div>
    </div>
  </div>
</nav>