<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php

use App\Model\Car\Department;
$departmentObj = new Department;

// $departmentObj->adddepartment($_REQUEST);
if ($_REQUEST['action']=='delete'){
    $departmentObj->deleteDepartment($_REQUEST['id']);
}
elseif ($_REQUEST['action']=='edit'){
    $department = $_REQUEST;
    unset($department['action']);
    $departmentObj->updateDepartment($department);
}
elseif ($_REQUEST['action']=='add'){
    $department = $_REQUEST;
    unset($department['action']);
    unset($department['id']);
    $departmentObj->addDepartment($department);
}
header('Location: index.php');
?>