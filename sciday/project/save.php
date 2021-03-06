<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/claviska/simpleimage/src/claviska/SimpleImage.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Project;
 $projectObj = new Project;  
 use App\Model\Sciday\Student;
 $studentObj = new Student;   
 use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;   
 use App\Model\Sciday\Imagespath;
 $imagespathObj = new Imagespath;   
?>
<?php
$data['project_name']=$_REQUEST['project_name'];
$data['level_id']=$_REQUEST['level_id'];
$data['school']=$_REQUEST['school'];
$data['student_id']=uniqid();
$data['teacher_id']=uniqid();
// $data['file_register']=;
$data['images_id']=uniqid();
$data['user_id']=$_REQUEST['user_id'];
if(isset($_FILES['file_doc']['tmp_name'])) {
    $ext = end(explode(".",$_FILES['file_doc']['name']));
    if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
        $new_name = "project-".uniqid().".".$ext;
        $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file/".$new_name;
        move_uploaded_file($_FILES['file_doc']['tmp_name'],$file_path);
        $data['file_register']=$new_name;
    }else{
        header("location: /science/sciday/project/form.php?activity=Mg==&error=Upload File ไม่ถูกต้อง ต้องเป็นไฟล์ PDF เท่านั้น");
    }
}else{
   
}
 $project_id = $projectObj->InsertProject($data);

if(isset($_REQUEST['sname'])){
    foreach ($_REQUEST['sname'] as $key => $sname) {
        $student['student_id']=$data['student_id'];
        $student['school']=$data['school'];
        $student['project_id']=$project_id;
        $student['stitle']=$_REQUEST['stitle'][$key];
        $student['sname']=$sname;
        $student['ssurname']=$_REQUEST['ssurname'][$key];
        $student_id = $studentObj->InsertStudent($student);

        
    }

}
if(isset($_REQUEST['tname'])){
    foreach ($_REQUEST['tname'] as $key => $tname) {
        $teacher['teacher_id']=$data['teacher_id'];
        $teacher['ttitle']=$_REQUEST['ttitle'][$key];
        $teacher['tname']=$tname;
        $teacher['tsurname']=$_REQUEST['tsurname'][$key];
        $teacher['project_id']=$project_id;
        $teacher['school']=$data['school'];
        $teacher_id = $teacherObj->InsertTeacher($teacher);

        
    }
}

foreach ($_REQUEST['img_path'] as $key => $imgs) {
    $img['images_id']=$data['images_id'];
    $img['images_path']=$imgs;
    $img['project_id']=$project_id;
    $images_id = $imagespathObj->InsertImagespath($img);

    
   
}
 
$project_id = base64_encode($project_id);
 header("location: /science/sciday/project/member.php?project_id={$project_id}");
?>