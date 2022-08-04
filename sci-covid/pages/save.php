<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php 
    use App\Model\Covid\Data;
    $dataObj = new Data;  
    use App\Model\Covid\Imagespath;
    $imagespathObj = new Imagespath;  
    use App\Model\Covid\Line;
    $lineObj = new Line;  
    // echo "<pre>"; 
    // print_r($_REQUEST);
    // echo "</pre>";
    try{
        
        $stu['name']=$_REQUEST['name'];
        $stu['surname']=$_REQUEST['surname'];
        $stu['tel']=$_REQUEST['tel'];
        $stu['stu_num']=$_REQUEST['stu_num'];
        $stu['class_id']=$_REQUEST['class_id'];
        $stu['magor_id']=$_REQUEST['magor_id'];
        $stu['date_covid']=$_REQUEST['date_covid'];
        $stu['remark']=$_REQUEST['remark'];
        $stu['images_id']=uniqid();

    // echo "<pre>"; 
    // print_r($stu);
    // echo "</pre>";
   
        $id = $dataObj->addData($stu);
        foreach ($_REQUEST['img_path'] as $key => $imgs) {
            $img['images_id']=$stu['images_id'];
            $img['images_path']=$imgs;
            $images_id = $imagespathObj->InsertImagespath($img);
        }
        $line = $lineObj->SentLine($id);
        header("location: /science/sci-covid/pages/intro.php?msg=success");
    }catch(Exception $e) {
        header("location: /science/sci-covid/pages/register.php?msg=error");
    }
    
//     echo "<pre>"; 
//     print_r($_FILES['img_path']);
//     echo "</pre>";

?>