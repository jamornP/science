<nav class="navbar navbar-expand-md navbar-dark bg-133 align-items-center">
  <div class="container-fluid align-items-center">
  
    <a class="navbar-brand " href="/science/pr/index.php">
    <i class='bx bxs-calendar'></i> ปฏิทินงาน PR
        
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
       
        
      </ul>
      <div class="">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php 
        if($_SESSION['login']){
          $name=$_SESSION['name']." ".$_SESSION['surname'];
          echo "
            <li class='nav-item dropdown ml-auto '>
              <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                {$name}
              </a>
              <div class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                <a class='dropdown-item' href='/science/pr/auth/edit.php'>แก้ไขข้อมูลส่วนตัว</a>
                <hr class='dropdown-divider'>
                <a class='dropdown-item' href='/science/pr/auth/logout.php'>ออกจากระบบ</a>
              </div>
            </li>
          ";
        }else {
          echo "
            <li class='nav-item '>
              <a href='/science/pr/auth/login.php'class='nav-link active'>เข้าสู่ระบบ</a>
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