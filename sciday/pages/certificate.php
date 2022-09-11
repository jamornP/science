<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
 use App\Model\Sciday\Certificate;
 $certificateObj = new Certificate; 
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
<?php
// if(isset($_POST['search'])){
//   echo"
//   <div class='alert alert-primary' role='alert'>
//     {$_POST['student']}
//   </div>
//   ";

// }
?>

<div class="container mt-5">
  <div class="card">
    <h5 class="card-header bg-primary text-white">ค้นหาใบประกาศนียบัตร งานนิทรรศการวันวิทยาศาสตร์ Science for every Generation ประจำปี 2565</h5>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <form action="" method="post" class="d-flex">
              <input class="form-control me-2" type="search" placeholder="ใส่ ชื่อ หรือ นามสกุล" aria-label="ใส่ ชื่อ หรือ นามสกุล" name="student" autofocus>
              <button class="btn btn-success text-white" type="submit" name="search"><i class='bx bx-search-alt'></i> Search</button>
            </form>
          </div>
        </div>
      </div>
      <hr>
      <?php 
        if(isset($_POST['search']) AND ($_POST['student']<>"")){
          $name = $_POST['student'];
          $data = $certificateObj->searchCertificate($name);
          ?>
          <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>#</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ใบประกาศนียบัตร</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $i=0;
              foreach($data as $student){
                $i++;
                $namestu=$student['studentTitle'].$student['studentName'];
                echo "
                  <tr>
                      <th>{$i}</th>
                      <td>{$namestu}</td>
                      <td>
                        <a class='text-decoration-none' href='{$student['certificateLink']}'><i class='bx bxs-download' ></i> Download</a>
                      </td>
                  </tr>
                ";
              }
            ?>
            </tbody>
        </table>
        <?php
        }
      ?>
      
                
       
    </div>
  </div>
</div>

</body>
</html>