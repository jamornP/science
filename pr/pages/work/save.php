
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Pr\Work;
$workObj = new Work; 
print_r($_REQUEST);
if($_REQUEST['edit']=='edit'){
    $data['title']=$_REQUEST['title'];
    $data['start_date']=$_REQUEST['start_date'];
    $data['start_time']=$_REQUEST['start_time'];
    $data['end_date']=$_REQUEST['end_date'];
    $data['end_time']=$_REQUEST['end_time'];
    $data['staff_id']=$_REQUEST['staff_id'];
    $data['url']=$_REQUEST['url'];
    $data['id']=$_REQUEST['id'];
    print_r($data);
    $b=$workObj->updateWork($data);
    header('Location: /science/pr/pages/work/');
}else{
    $data = $_REQUEST;
    unset($data['edit']);
    $w=$workObj->addWork($data);
    header('Location: /science/pr/pages/work/index.php?msg=ok');
}

?>