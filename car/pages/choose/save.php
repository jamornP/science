<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php

use App\Model\Car\Choose;
$chooseObj = new Choose;

// $chooseObj->addChoose($_REQUEST);
if ($_REQUEST['action']=='delete'){
    $chooseObj->deleteChoose($_REQUEST['id']);
}
elseif ($_REQUEST['action']=='edit'){
    $choose = $_REQUEST;
    unset($choose['action']);
    $chooseObj->updateChoose($choose);
}
elseif ($_REQUEST['action']=='add'){
    $choose = $_REQUEST;
    unset($choose['action']);
    unset($choose['id']);
    $chooseObj->addChoose($choose);
}
header('Location: index.php');
?>