<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sci-Day2023</title>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/link.php"; ?>

</head>

<body class="font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/science/sciday/components/navbar2023.php"; ?>
    <?php 
        date_default_timezone_set('Asia/Bangkok');
        $pro_id = base64_decode($_GET['pro_id']);
        if(isset($_POST['yes'])){
            $data['date_at']=date("Y-m-d H:i:s");
            $data['pro_id']=$_POST['pro_id'];
            $data['atten']="Yes";
            $ck = $adminObj->getAttenByProject("count",$pro_id);
            if($ck>0){
                $ckU = $adminObj->updateAtten($data);
            }else{
                $ckU = $adminObj->addAtten($data);
            }
            if($ckU){
                $mes = "แจ้งความประสงค์เรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";
            }
        }
        if(isset($_POST['no'])){
            $data['date_at']=date("Y-m-d H:i:s");
            $data['pro_id']=$_POST['pro_id'];
            $data['atten']="No";
            $ck = $adminObj->getAttenByProject("count",$pro_id);
            if($ck>0){
                $ckU = $adminObj->updateAtten($data);
            }else{
                $ckU = $adminObj->addAtten($data);
            }
            if($ckU){
                $mes = "แจ้งความประสงค์เรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 2000 })</script>";
            }
        }
        $dataAtten = $adminObj->getAttenByProject("data",$pro_id);
        if($dataAtten['atten']=="Yes"){
            echo "
                <div class='container mt-5'>
                    <div class='card'>
                        <h5 class='card-header bg-242 text-center'>ความประสงค์ของท่านล่าสุด ({$dataAtten['date_at']})</h5>
                        <div class='card-body'>
                            <h3 class='text-center text-success' > <b>เข้าร่วมรอบตัดสิน</b></h3>
                        </div>
                    </div>
                </div>
                
            ";
        }elseif($dataAtten['atten']=="No"){
            echo "
                <div class='container mt-5'>
                    <div class='card'>
                        <h5 class='card-header bg-242 text-center'>ความประสงค์ของท่านล่าสุด ({$dataAtten['date_at']})</h5>
                        <div class='card-body'>
                            <h3 class='text-center text-danger' > <b>ไม่สามารถเข้าร่วมรอบตัดสิน</b></h3>
                        </div>
                    </div>
                </div>
                
            ";
        }

    ?>
    <div class="container mt-5">

        <div class="card">
            <h5 class="card-header bg-170 ">แจ้งความประสงค์เข้าร่วมรอบตัดสิน</h5>
            <div class="card-body">
                <h5 class="text-center">
                    ทีมของท่านได้ผ่านเข้ารอบตัดสิน โดยรอบตัดสินจะจัดแข่งขันที่ <b class="text-primary">คณะวิทยาศาสตร์ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</b><br>
                    <b class="text-danger">ท่านมีความประสงค์ที่จะเข้าร่วมการแข่งขันรอบตัดสินที่ คณะวิทยาศาสตร์ สจล. หรือไม่ ?</b>
                </h5>
                <form action="" method="post">
                    <input type="hidden" name="pro_id" value="<?php echo $pro_id;?>">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success text-white mt-2" name="yes">เข้าร่วม</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger text-white mt-2" name="no">ไม่สามารถเข้าร่วม</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>