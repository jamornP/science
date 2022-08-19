<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php //require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>

<?php
    use App\Model\Sciday\Success;
    $successObj = new Success;  
    $_REQUEST['date_add'] = date("Y-m-d H:i:s");
    $data['project_id']=$_REQUEST['project_id'];
    $data['activity_id']=$_REQUEST['activity_id'];
    if($successObj->CheckSuccess($data)){
        echo "true";
        $data['date_add']= date("Y-m-d H:i:s");
        // print_r($data);
        $ck=$successObj->UpdateSuccess($data);
    }else{
        echo "fales";
        $ck=$successObj->InsertSuccess($_REQUEST);
    }
    $project_id = base64_encode($_REQUEST['project_id']);
    switch ($_REQUEST['activity_id']) {
        case 1:
            header("location: /science/sciday/artifact/member.php?artifact_id={$project_id}");
            break;
        case 2:
            header("location: /science/sciday/project/member.php?project_id={$project_id}");
            break;
        case 3:
            header("location: /science/sciday/iot/member.php?iot_id={$project_id}");
            break;
        case 4:
            header("location: /science/sciday/answer/member.php?answer_id={$project_id}");
            break;
        case 6:
            header("location: /science/sciday/micro/member.php?micro_id={$project_id}");
            break;
    }
    // print_r($_REQUEST);
    // echo "<br>";
   
    
   
?>