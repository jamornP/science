<?php 
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
?>
?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/claviska/simpleimage/src/claviska/SimpleImage.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Esports;
 $esportsObj = new Esports;  
 use App\Model\Sciday\Student;
 $studentObj = new Student;   
 use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;   
 use App\Model\Sciday\Imagespath;
 $imagespathObj = new Imagespath;   
?>
<?php
$data['school']=$_REQUEST['school'];
$data['team']=$_REQUEST['team'];
$data['student_id']=uniqid();
$data['teacher_id']=uniqid();
$data['tel']=$_REQUEST['tel'];
$data['user_id']=$_REQUEST['user_id'];
if(isset($_FILES['file_doc']['tmp_name'])) {
    $ext = end(explode(".",$_FILES['file_doc']['name']));
    if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
        $new_name = $_REQUEST['team']."-".uniqid().".".$ext;
        $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file/".$new_name;
        move_uploaded_file($_FILES['file_doc']['tmp_name'],$file_path);
        $data['file_register']=$new_name;
    }
}else{
    echo "No file";
}
echo "<pre>";
print_r($data);
echo "</pre>";
 $esports_id = $esportsObj->InsertEsports($data);
if(isset($_REQUEST['sname'])){
    foreach ($_REQUEST['sname'] as $key => $sname) {
        $student['student_id']=$data['student_id'];
        $student['school']=$data['school'];
        $student['project_id']=$esports_id;
        $student['stitle']=$_REQUEST['stitle'][$key];
        $student['sname']=$sname;
        $student['ssurname']=$_REQUEST['ssurname'][$key];
         $student_id = $studentObj->InsertStudent($student);
        echo "<pre>"; 
        print_r($student);
        echo "</pre>";
    }
}
if(isset($_REQUEST['tname'])){
    foreach ($_REQUEST['tname'] as $key => $tname) {
        $teacher['teacher_id']=$data['teacher_id'];
        $teacher['ttitle']=$_REQUEST['ttitle'][$key];
        $teacher['tname']=$tname;
        $teacher['tsurname']=$_REQUEST['tsurname'][$key];
        $teacher['project_id']=$esports_id;
        $teacher['school']=$data['school'];
        $teacher_id = $teacherObj->InsertTeacher($teacher);

    }
}
$esports_id = base64_encode($esports_id);
 header("location: /science/sciday/esports/member.php?esport_id={$esports_id}");
?>