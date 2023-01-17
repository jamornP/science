<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
 use App\Model\Tcas66\Certificate;
 $tcasObj = new Certificate;   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/components/link.php";?>
</head>
<body class="font-kanit">
    <nav class="navbar navbar-dark bg-warning text-white">
        <div class="container-fluid">
            <h3>Download เกียรติบัตรกิจกรรมอบรมพื้นฐานวิทยาศาสตร์และการเตรียมตัวเพื่อศึกษาต่อในระดับอุดมศึกษา "โค้งสุดท้าย TCAS รอบ portfolio"</h3>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card mb-3 h-100">
                    <div class="card-header bg-info text-white">กรอกข้อมูล</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">ชื่อ *(เฉพาะชื่อเท่านั้น)</label>
                                <input type="text" class="form-control" name="name" autofocus>
                            </div>
                            <button type="submit" class="btn btn-success mt-2 text-white" name="submit">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
       
            <div class="col-md">
                <div class="card mb-3 h-100">
                    <div class="card-header bg-success text-white">Download เกียรติบัตร</div>
                    <div class="card-body">
                        <?php
                        if(isset($_POST['submit'])){ 
                            // echo $_POST['name'];
                            $persons = $tcasObj->getPersonByName($_POST['name']);
                            // echo $persons;
                        ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ-สกุล</th>
                                    <!-- <th>email</th> -->
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                
                                $n=0;
                                foreach($persons as $person) {
                                    $n++;
                                    $name =$person['title'].$person['name']." ".$person['surname'];
                                    if($person['file_cer']!=""){
                                        $download = "Download";
                                    }else{
                                        $download = "";
                                    }
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$name}</td>                                 
                                            
                                            <td class='text-right'>
                                                 <a href='{$person['file_cer']}'>{$download}</a>                                           
                                            </td>                                          
                                        </tr>
                                    ";
                                }
                            ?>
                                
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- <a href="/science/certificate/pdf/gencer.php" class="btn btn-primary text-white">Gen Certificate</a> -->
        <?php
        // $data = $tcasObj->getCerByProject(' กิจกรรมอบรมพื้นฐานวิทยาศาสตร์และการเตรียมตัวเพื่อศึกษาต่อในระดับอุดมศึกษา');
        // print_r($data);
        ?>
    </div>
</body>
</html>