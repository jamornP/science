<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php


use App\Model\Car\Statusbook;

$statusObj = new Statusbook;

//  echo $_REQUEST['action'];
//  print_r ($_REQUEST);

if ($_REQUEST['action']=='delete'){
    $statusObj->deleteStatus($_REQUEST['id']);
}
elseif ($_REQUEST['action']=='edit'){
    $status = $_REQUEST;
    unset($status['action']);
    $statusObj->updateStatus($status);
}
elseif ($_REQUEST['action']=='add'){
    $status = $_REQUEST;
    unset($status['action']);
    unset($status['id']);
    // print_r($status);
    $statusObj->addStatus($status);
}

header('Location: index.php');


?>