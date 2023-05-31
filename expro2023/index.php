<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science KMITL Expro 2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/expro2023/components/link.php"; ?>
</head>

<body class="font-sriracha">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/expro2023/components/nav.php"; ?>
    <div class="container mt-5">
        <div class="container mt-5">
            <div class="card">
                <h5 class="card-header">ขั้นตอนที่ 1</h5>
                <div class="card-body">

                    <form action="" method="POST">
                        <!-- <label for="datepicker">เลือกวันที่</label> -->
                        <div class="">




                            <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">ชื่อ-นามสกุล</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" autofocus required>
                                    </div>
                                    <?php

                                    $dataDate = $dateObj->getDate();
                                    foreach ($dataDate as $d) {
                                        $date = datethai($d['d_date']);
                                        echo "
                                    <h5>วันที่ {$date}</h5>
                                    
                                ";
                                        $dataData = $dateObj->getData($d['d_date']);
                                        foreach ($dataData as $da) {
                                            if ($da['d_name'] == "") {
                                                $name = "ว่าง";
                                            } else {
                                                $name = $da['d_name'];
                                            }
                                            if ($da['d_status'] == 0) {
                                                $dis = "";
                                            } else {
                                                $dis = "disabled";
                                            }
                                            echo "
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='time' id='{$da['id']}' {$dis}>
                                        <label class='form-check-label' for='{$da['id']}'>
                                           เวลา {$da['d_time']} ..... ผู้รับผิดชอบ => <b class='text-primary'>{$name}</b>
                                        </label>
                                    </div>
                                    ";
                                        }
                                        echo "<hr>";
                                    }

                                    ?>



                                </div>

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