<?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php
use App\Model\Certificate;

$caObj = new Certificate;

switch ($_SESSION['program']) {
    case "certificate":?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><i class='bx bx-car'></i>App Certificate</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/science/certificate/backend/">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Upload Certificat
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                      $cas = $caObj->getAllCA();
                      foreach($cas as $ca) {
                        echo "
                          <li><a class='dropdown-item' href='/science/certificate/backend/upload_file.php?project={$ca['project']}'>{$ca['project']}</a></li>
                        ";
                      }
                    ?>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/science/certificate/backend/upload_file.php">Upload Certificate</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Create Certificate</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/science/certificate/backend/data_certificate.php">Data Certificate</a>
                </li>
              </ul>
              <div class="">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<?php
    break;
    default:
      echo "Your favorite color is neither red, blue, nor green!";
    }
?>
                  <?php 
                    if($_SESSION['login']){
                      $name=$_SESSION['name']." ".$_SESSION['surname']." (".$_SESSION['role'].")";
                      echo "
                        <li class='nav-item dropdown ml-auto '>
                          <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            {$name}
                          </a>
                          <div class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                            
                            
                            <a class='dropdown-item' href='/science/certificate/auth/logout.php'>ออกจากระบบ</a>
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
                </ul>
              </div>
          </div>
      </nav>