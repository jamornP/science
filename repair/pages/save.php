<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Repair\Repair;
$repairObj = new Repair;
// use App\Model\Repair\Department;
// $departmentObj = new Department;
// use App\Model\Repair\Type;
// $typeObj = new Type;
// use App\Model\Repair\Nature;
// $natureObj = new Nature;
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
<?php 
// if(isset($_POST['fullname']) && $_POST['fullname']<>""){
    
//     $mes="บันทึกข้อมูลเรียบร้อย";
//     echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 100000 })</script>"; 
// }else{
//     $mes="บันทึกไม่สำเร็จ";
//     echo "<script type='text/javascript'>toastr.danger('" . $mes . "', { timeOut: 100000 })</script>";
$_REQUEST['date_add']= date("Y-m-d H:i:s");
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";
$ck = $repairObj->addRepair($_REQUEST);
$mes="บันทึกข้อมูลเรียบร้อย";
echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 3000 })</script>";   
// exit();
echo "  <script type='text/javascript'>
            setTimeout(function(){location.href='/science/repair/pages/repair.php'} , 3000);
        </script>
";
?>
<!-- window.location.href = '/science/repair/pages/repair.php' -->
</body>
</html>