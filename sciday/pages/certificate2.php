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
            $text = array("studentName"=> "{$name}","certificateName"=> "นิทรรศการวันวิทยาศาสตร์ Science for every Generation", "sortBy"=> "batchId,", "sortDirectionBy"=> "DESC", "limit"=> array("pageSize"=> 50, "pageNumber"=> 1));
            // echo json_encode($text);
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://scica.science.kmitl.ac.th/eds-external/digital-certificate/list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($text),
            CURLOPT_HTTPHEADER => array(
                'accept: application/json',
                'Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IlNDSURBWSIsImV4cCI6NDcwNzk0NjQ2NSwianRpIjoiZjJmZTk5NGQtYjZkMy00MGQ0LWI4OTItZDc3NDA5MWI0OTE1IiwiaWF0IjoxNjMyMTA2NDY1LCJpc3MiOiJWeER4bk1ycWhPbzZUbmRmZ3NEdkRYdjVWaklzbWxVNSIsIm5iZiI6MTYzMjEwNjQ2NX0.eYSBC-bLhaf9_cnnpXUBtI26MdpmW9-Qf5ZO3axWnpE',
                'Content-Type: application/json'
            ),
            ));
    
            $response = curl_exec($curl);
            curl_close($curl);
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
                $data = json_decode($response, true);
                $i=0;
                foreach ($data['certificate'] as $key => $value) {
                    $i++;
                    $Title=$data["certificate"][$key]["data"]["studentTitle"];
                    $StudentName=$data["certificate"][$key]["data"]["studentTitle"].$data["certificate"][$key]["data"]["studentName"];
                    $certificateLink=$data["certificate"][$key]["info"]["docPublicUrl"]; 
                    echo "
                        <tr>
                            <th scope='row'>{$i}</th>
                            <td>{$StudentName}</td>
                            <td><a href='{$certificateLink}'>Download</a></td>
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