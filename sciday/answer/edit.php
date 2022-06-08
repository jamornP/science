<?php 
    // echo "<pre>"; 
    // print_r($_REQUEST);
    // echo "</pre><br>";
?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/claviska/simpleimage/src/claviska/SimpleImage.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Answer;
 $answerObj = new Answer;  
 use App\Model\Sciday\Student;
 $studentObj = new Student;   
 use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;   
 use App\Model\Sciday\Imagespath;
 $imagespathObj = new Imagespath;   
?>
<?php
$data['answer_id']=$_REQUEST['answer_id'];
$data['level_id']=$_REQUEST['level_id'];
$data['school']=$_REQUEST['school'];
$data['student_id']=$_REQUEST['student_id'];
$data['teacher_id']=$_REQUEST['teacher_id'];
$data['tel']=$_REQUEST['tel'];

if(isset($_FILES['file_doc']['tmp_name'])) {
    $ext = end(explode(".",$_FILES['file_doc']['name']));
    echo $ext;
    if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
        $new_name = $_REQUEST['school']."-".uniqid().".".$ext;
        $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file/".$new_name;
        move_uploaded_file($_FILES['file_doc']['tmp_name'],$file_path);
        $data['file_register']=$new_name;
        echo "$new_name";
    }else{
        $data['file_register']=$_REQUEST['file_register'];
    }
}else{
     echo "No file";
    $data['file_register']=$_REQUEST['file_register'];
}
if(isset($_REQUEST['sname'])){
    foreach ($_REQUEST['sname'] as $key => $sname) {
        $student['stitle']=$_REQUEST['stitle'][$key];
        $student['sname']=$_REQUEST['sname'][$key];;
        $student['ssurname']=$_REQUEST['ssurname'][$key];
        $student['id']=$_REQUEST['sid'][$key];
        $sck = $studentObj->UpdateStudent($student);
    }
}
if(isset($_REQUEST['tname'])){
    foreach ($_REQUEST['tname'] as $key => $tname) {
        $teacher['ttitle']=$_REQUEST['ttitle'][$key];
        $teacher['tname']=$_REQUEST['tname'][$key];
        $teacher['tsurname']=$_REQUEST['tsurname'][$key];
        $teacher['id']=$_REQUEST['tid'][$key];
        $tck = $teacherObj->UpdateTeacher($teacher);
    }
}
echo "<pre>"; 
print_r($data);
echo "</pre><br>";
$ack = $answerObj->UpdateAnswer($data);

?>