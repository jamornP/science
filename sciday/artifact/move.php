<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
    use App\Model\Sciday\Level;
    $levelObj = new Level;
    use App\Model\Sciday\Project;
    $projectObj = new Project;  
    use App\Model\Sciday\Artifact;
    $artifactObj = new Artifact;  

?>
<?php 
    print_r($_REQUEST);
    $dataa=$artifactObj->getArtifactById($_REQUEST['id']);
    echo "<br>";
    echo "<pre>";
    print_r($dataa);
    echo "</pre>";
    $datap['project_name']=$dataa['artifact_name'];
    switch ($dataa['level_id']) {
        case 1:
            $datap['level_id']=4;
            break;
        case 2:
            $datap['level_id']=5;
            break;
        case 3:
            $datap['level_id']=6;
            break;
    }
    $datap['school']=$dataa['school'];
    $datap['student_id']=$dataa['student_id'];
    $datap['teacher_id']=$dataa['teacher_id'];
    $datap['file_register']=$dataa['file_register'];
    $datap['images_id']=$dataa['images_id'];
    $datap['user_id']=$dataa['user_id'];
    echo "<pre>";
    print_r($datap);
    echo "</pre>";
     $ck=$projectObj->InsertProject($datap);
    if($ck){
        echo "Yes";
        $ckdel=$artifactObj->delArtifactById($_REQUEST['id']);
        $level_id=base64_encode($dataa['level_id']);
        header("location: /science/sciday/artifact/manage.php?level={$level_id}");
    }else{
        echo "No";
        $level_id=base64_encode($dataa['level_id']);
        header("location: /science/sciday/artifact/manage.php?level={$level_id}&error=error");
    }
?>