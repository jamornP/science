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
    $datap=$projectObj->getProjectById($_REQUEST['id']);
    echo "<br>";
    echo "<pre>";
    print_r($datap);
    echo "</pre>";
    $dataa['artifact_name']=$datap['project_name'];
    switch ($datap['level_id']) {
        case 4:
            $dataa['level_id']=1;
            break;
        case 5:
            $dataa['level_id']=2;
            break;
        case 6:
            $dataa['level_id']=3;
            break;
    }
    $dataa['school']=$datap['school'];
    $dataa['student_id']=$datap['student_id'];
    $dataa['teacher_id']=$datap['teacher_id'];
    $dataa['file_register']=$datap['file_register'];
    $dataa['images_id']=$datap['images_id'];
    $dataa['user_id']=$datap['user_id'];
    echo "<pre>";
    print_r($dataa);
    echo "</pre>";
    $ck=$artifactObj->InsertArtifact($dataa);
    if($ck){
        echo "Yes";
        $ckdel=$projectObj->delProjectById($_REQUEST['id']);
        $level_id=base64_encode($datap['level_id']);
        header("location: /science/sciday/project/manage.php?level={$level_id}");
    }else{
        echo "No";
        $level_id=base64_encode($datap['level_id']);
        header("location: /science/sciday/project/manage.php?level={$level_id}&error=error");
    }
?>