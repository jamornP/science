<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
 use App\Model\Certificate;
 $personObj = new Certificate;   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link rel="stylesheet" href="../../theme/css/bootstrap-theme.css">
</head>
<body class="font-kanit">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/components/navbar.php";?>
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header bg-info text-white">กรอกข้อมูล</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">ชื่อ *(เฉพาะชื่อเท่านั้น)</label>
                                <input type="text" class="form-control" name="name" autofocus>
                            </div>
                            <button type="submit" class="btn btn-success mt-2" name="submit">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div>

        <div class="row"> -->
            <div class="col-md">
                <div class="card mb-3 h-100">
                    <div class="card-header bg-success text-white">Download เกียรติบัตร</div>
                    <div class="card-body">
                        <?php
                        if(isset($_POST['submit'])){ 
                            $persons = $personObj->getPersonByName($_POST['name']);
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
                                    if($person['address']!=""){
                                        $download = "Download";
                                    }else{
                                        $download = "";
                                    }
                                    echo "
                                        <tr>
                                            <td>{$n}</td>
                                            <td>{$name}</td>                                 
                                            
                                            <td class='text-right'>
                                                 <a href='/science/upload/{$person['address']}'>{$download}</a>                                           
                                            </td>                                          
                                        </tr>
                                    ";
                                }
                            ?>
                                
                            </tbody>
                        </table>
                        <?php }else{
                                
                                $persons = $personObj->getAllPerson();
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
                                        if($person['address']!=""){
                                            $download = "Download";
                                        }else{
                                            $download = "";
                                        }
                                        echo "
                                            <tr>
                                                <td>{$n}</td>
                                                <td>{$name}</td>                                 
                                                
                                                <td class='text-right'>
                                                     <a href='/science/upload/{$person['address']}'>{$download}</a>                                           
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
    </div>
</body>
</html>