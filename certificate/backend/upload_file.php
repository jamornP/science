<?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
    use App\Model\Certificate;
    $caObj = new Certificate;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Admin</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/components/link.php";?>
    
</head>
<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/components/navbar.php";?>
    <?php 
        // print_r($_REQUEST);
        $project =$_REQUEST['project'];
     ?>
    <div class="container mt-5">
            <div class="row">
                <div class="col-md">
                    <div class="card mb-3 h-100">
                        <div class="card-header bg-primary text-white">Upload File เกียรติบัตร <?php echo $_REQUEST['project'];?></div>
                        <div class="card-body">
                            <form action="save.php" method="post" enctype="multipart/form-data">
                            <font color="red">*ชื่อโครงการ </font>
                                <input type="text" class="form-control" name="project" value="<?php echo $_REQUEST['project'];?>" readonly required>
                                <font color="red">*อัพโหลดได้เฉพาะ .pdf ได้ครั้งละ 50 ไฟล์ เท่านั้น </font>
                                <input type="file" name="file[]" required   class="form-control" accept="application/pdf"  multiple> <br>
                                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md">
                    <div class="card mb-3 h-100">
                        <div class="card-header bg-success text-white">ข้อมูลผู้ที่ได้รับเกียรติบัตร</div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>email</th>
                                        <th>เกียรติบัตร</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    $personObj = new Certificate();
                                    
                                    $persons = $personObj->getAllPersonProject($project);
                                    $n=0;
                                    foreach($persons as $person) {
                                        $n++;
                                        $name =$person['title'].$person['name']." ".$person['surname'];
                                        $download = end(explode("/",$person['address']));
                                        echo "
                                            <tr>
                                                <td>{$n}</td>
                                                <td>{$name}</td>                                 
                                                <td>{$person['email']}</td>
                                                <td class='text-right'>
                                                    <a href='/science/upload/{$person['address']}'>{$download}</a>                                           
                                                </td>                                          
                                            </tr>
                                        ";
                                    }
                                ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>