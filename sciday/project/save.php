<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/claviska/simpleimage/src/claviska/SimpleImage.php"?>
<?php 
 use App\Model\Sciday\Project;
 $projectObj = new Project;  
 use App\Model\Sciday\Student;
 $studentObj = new Student;   
 use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;   
?>
<?php
$data['project_name']=$_REQUEST['project_name'];
$data['level_id']=$_REQUEST['level_id'];
$data['school']=$_REQUEST['school'];
$data['student_id']=uniqid();
$data['teacher_id']=uniqid();
// $data['file_register']=;
$data['images_id']=uniqid();
if(isset($_FILES['file_doc']['tmp_name'])) {
    $ext = end(explode(".",$_FILES['file_doc']['name']));
    if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
        $new_name = $_REQUEST['project_name']."-".uniqid().".".$ext;
        $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file/".$new_name;
        move_uploaded_file($_FILES['file_doc']['tmp_name'],$file_path);
        $data['file_register']=$new_name;
    }
}
$project_id = $projectObj->InsertProject($data);
echo $id;
echo "<pre>"; 
print_r($data);
echo "</pre>";
echo "
    <p>ผู้เข้าประกวด </p>
    <ol>
";

foreach ($_REQUEST['sname'] as $key => $name) {
    $student['student_id']=$data['student_id'];
    $student['school']=$data['school'];
    $student['project_id']=$project_id;
    $student['stitle']=$_REQUEST['stitle'][$key];
    $student['sname']=$name;
    $student['ssurname']=$_REQUEST['ssurname'][$key];
    $student_id = $studentObj->InsertStudent($student);

    $peple =$_REQUEST['stitle'][$key].$name." ".$_REQUEST['ssurname'][$key]." ID : ".$student_id;
    echo "
        <li>    
            <p> {$peple}</p>
        </li>
    ";
}
echo "</ol>";
echo "
    <p>อาจารย์ที่ปรึหษา </p>
    <ol>
";

foreach ($_REQUEST['tname'] as $key => $tname) {
    $teacher['teacher_id']=$data['teacher_id'];
    $teacher['ttitle']=$_REQUEST['ttitle'][$key];
    $teacher['tname']=$tname;
    $teacher['tsurname']=$_REQUEST['tsurname'][$key];
    $teacher['project_id']=$project_id;
    $teacher['school']=$data['school'];
    $teacher_id = $teacherObj->InsertTeacher($teacher);

    $tpeple =$_REQUEST['ttitle'][$key].$tname." ".$_REQUEST['tsurname'][$key]." ID : ".$teacher_id;
    echo "
        <li>    
            <p> {$tpeple}</p>
        </li>
    ";
}
echo "</ol>";
echo "<pre>"; 
print_r($_REQUEST);
echo "</pre>";
echo "<pre>"; 
print_r($_FILES['file_doc']);
echo "</pre>";
?>