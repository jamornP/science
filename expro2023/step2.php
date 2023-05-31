<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science KMITL Expro 2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/expro2023/components/link.php";?>
</head>
<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/expro2023/components/nav.php";?>
<div class="container mt-5">
<div class="container mt-5">
        <div class="card">
            <h5 class="card-header">ขั้นตอนที่ 2</h5>
            <div class="card-body">
                
                <form action="" method="POST">
                    <label for="datepicker">เลือกเวลา</label>
                    <div class="d-flex mb-2">
                    
                        <div class="">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>---เลือกวันที่---</option>
                                <?php
                                    $dataDate = $dateObj->getDate();
                                    foreach($dataDate as $d){
                                        $shoDate = datethai($d['d_date']);
                                        echo "
                                        <option value='1'>{$shoDate}</option>
                                        ";
                                    }
                                    print_r($dataDate);
                                ?>
                                <!-- <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option> -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mx-2 text-white" name="add">Next</button>
                    </div>
                </form>
            
            </div>
        </div>

    </div>
</div>
</body>
</html>