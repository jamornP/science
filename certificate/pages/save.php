<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php 
use App\Model\Certificate;

$caObj = new Certificate();
// echo "<pre>"; 
// print_r($_FILES);
// echo "</pre>";
if(isset($_POST['submit'])){
    $project =$_POST['project'];
    if(is_dir("../../upload/$project")){
        
    }else{
        mkdir("../../upload/$project");
    }
    $ca['project'] = $project;
    foreach($_FILES['file']['tmp_name'] as $key => $value) {
        $ext = end(explode(".",$_FILES['file']['name'][$key]));
        if($ext=='pdf'){
            
            $id = (explode(".",end(explode("-",$_FILES['file']['name'][$key]))))[0];
            $new_name = $id."-".$project.".".$ext;
            $file_path = "../../upload/".$project."/".$new_name;
            
            $ca['t_num'] = $id;
            $ca['address'] = $project."/".$new_name;
            move_uploaded_file($_FILES['file']['tmp_name'][$key],$file_path);
            $caObj->addPDF($ca);
            

        }
        
        // echo "<pre>"; 
        // print_r($file_path);
        // echo "</pre>";
    }
    header('Location: file.php');
}
?>