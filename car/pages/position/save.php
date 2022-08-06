<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php

use App\Model\Car\Position;
$positionObj = new Position;

// $positionObj->addposition($_REQUEST);
if ($_REQUEST['action']=='delete'){
    $positionObj->deletePosition($_REQUEST['id']);
}
elseif ($_REQUEST['action']=='edit'){
    $position = $_REQUEST;
    unset($position['action']);
    $positionObj->updatePosition($position);
}
elseif ($_REQUEST['action']=='add'){
    $position = $_REQUEST;
    unset($position['action']);
    unset($position['id']);
    $positionObj->addPosition($position);
}
header('Location: index.php');
?>