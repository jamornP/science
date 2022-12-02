<?php require $_SERVER['DOCUMENT_ROOT']."/science/function/function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งซ่อม</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/tcas66/components/link.php"; ?>
</head>

<body class="font-kanit">
<?php require $_SERVER['DOCUMENT_ROOT']."/science/tcas66/components/navbar.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/tcas66/components/navbar2.php"; ?>
    <?php 
        if(isset($_REQUEST['msg'])){
            if($_REQUEST['msg']=='ok'){
                $mes="บันทึกข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 50000 })</script>";   
            }
            if($_REQUEST['msg']=='edit'){
                $mes="แก้ไขข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 50000 })</script>";   
            }
           
        }
    ?>

</body>

</html>