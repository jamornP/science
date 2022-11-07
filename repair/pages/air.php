<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Repair\Building;
$buildingObj = new Building;
use App\Model\Repair\Department;
$departmentObj = new Department;
// $building = $buildingObj->getBuilding();
// print_r($building);
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งซ่อม</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/repair/components/link.php"; ?>
</head>

<body class="font-sriracha">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/repair/components/navbar.php"; ?>
<div class="container mt-5">
    <div id="in"></div>
    <div class="card">
        <!-- <from action="save.php" method="post"> -->
            <form id="add" action="save.php" method="post">
            <h5 class="card-header bg-primary text-white">ฟอร์มข้อมูล</h5>
            <div class="card-body">
                <h5 class="card-title text-primary"><span class="badge rounded-pill bg-info">ข้อมูลผู้แจ้ง</span></h5>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">ชื่อ-สกุล</label>
                            <input type="text" class="form-control" id="fullname" placeholder="" name="fullname" autofocus required>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="department" class="form-label">หน่วยงาน</label>
                            <select class="form-select" id="department" aria-label="Default select example" name="department" required>
                                <option selected disable>กรุณาเลือก</option>
                                <?php
                                    $datad = $departmentObj->getDepartment();
                                    foreach($datad as $depart){
                                        echo "
                                            <option value='{$depart['d_id']}'>{$depart['d_name']}</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="tel" class="form-label">เบอร์ติดต่อ</label>
                            <input type="tel" class="form-control" id="tel" placeholder="0861234567" required>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="yearterm" class="form-label">ปีงบประมาน</label>
                            <input type="text" class="form-control" id="yearterm" placeholder="" value="<?php echo yearterm(date('Y-m-d'));?>" readonly>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="card-title text-primary"><span class="badge rounded-pill bg-info">ข้อมูลแจ้งซ่อม</span></h5>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="building" class="form-label">อาคาร</label>
                            <select class="form-select" id="building" aria-label="Default select example" name="building" required>
                                <option selected disable >กรุณาเลือก</option>
                                <?php
                                    $building = $buildingObj->getBuilding();
                                    foreach($building as $datab){
                                        echo "
                                            <option value='{$datab['b_id']}'>{$datab['b_name']}</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="floor" class="form-label">ชั้น</label>
                            <select class="form-select" id="floor" aria-label="Default select example" name="floor" required>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="room" class="form-label">ห้อง</label>
                            <select class="form-select" id="room" aria-label="Default select example" name="room" required>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="air" class="form-label">เลขครุภัณฑ์</label>
                            <select class="form-select" id="air" aria-label="Default select example" name="air" required>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">รายละเอียดแจ้งซ่อม</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remark" required></textarea>
                            <input type="hidden" class="form-control" id="a_num" placeholder="" name="a_num" >
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-3 mr-2">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">บันทึก</button>
                    <button class="btn btn-primary me-md-2" type="button">ยกเลิก</button>
                </div>  
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#building').change(function(){
        var bid = $(this).val();
        $.ajax({
            type: "post",
            url: "/science/repair/pages/ajax/address.php",
            data: {b_id:bid,function:'building'},
            success: function(data){
                $('#floor').html(data)
            }
        });
    });
    $('#floor').change(function(){
        var fid = $(this).val();
        $.ajax({
            type: "post",
            url: "/science/repair/pages/ajax/address.php",
            data: {f_id:fid,function:'floor'},
            success: function(data){
                $('#room').html(data)
            }
        });
    });
    $('#room').change(function(){
        var rid = $(this).val();
        $.ajax({
            type: "post",
            url: "/science/repair/pages/ajax/address.php",
            data: {r_id:rid,function:'room'},
            success: function(data){
                $('#air').html(data)
            }
        });
    });
    $('#air').change(function(){        
        var a_num = document.getElementById('air').selectedOptions[0].text;

        $('#a_num').val(a_num);
        
    });
</script>
</body>
</html>