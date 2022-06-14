<?php 
print_r($_REQUEST);
?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/claviska/simpleimage/src/claviska/SimpleImage.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
 use App\Model\Sciday\Micro;
 $microObj = new Micro;  
 use App\Model\Sciday\Student;
 $studentObj = new Student;   
 use App\Model\Sciday\Teacher;
 $teacherObj = new Teacher;   
 use App\Model\Sciday\Imagespath;
 $imagespathObj = new Imagespath;   
?>
<?php
$data['micro_id']=$_REQUEST['micro_id'];
$data['micro_name']=$_REQUEST['micro_name'];
$data['level_id']=$_REQUEST['level_id'];
$data['school']=$_REQUEST['school'];
$data['student_id']=$_REQUEST['student_id'];
$data['teacher_id']=$_REQUEST['teacher_id'];

if(isset($_FILES['file_doc']['tmp_name'])) {
    $ext = end(explode(".",$_FILES['file_doc']['name']));
    echo $ext;
    if($ext=='pdf' OR $ext=='docx' OR $ext=='doc'){
        $new_name = $_REQUEST['micro_name']."-".uniqid().".".$ext;
        $file_path = $_SERVER['DOCUMENT_ROOT']."/science/upload/sciday/file/".$new_name;
        move_uploaded_file($_FILES['file_doc']['tmp_name'],$file_path);
        $data['file_register']=$new_name;
        echo "$new_name";
    }else{
        $data['file_register']=$_REQUEST['file_register'];
    }
    echo "File";
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

if($_REQUEST['img_path']){
    $data['images_id']=uniqid();
    foreach ($_REQUEST['img_path'] as $imgs) {
        $img['images_id']=$data['images_id'];
        $img['images_path']=$imgs;
        $img['project_id']=$_REQUEST['micro_id'];
        $images_id = $imagespathObj->InsertImagespath($img);
    }
    
    
    echo "มี Pic";
    
}else{
     echo "No Pic";
    $data['images_id']=$_REQUEST['images_id'];
}

$pck = $microObj->Updatemicro($data);
$micro_id = base64_encode($_REQUEST['micro_id']);
if($pck){
    header("location: /science/sciday/micro/member.php?activity=1&micro_id={$micro_id}");
}else{
    header("location: /science/sciday/micro/member.php?activity=1&micro_id={$micro_id}&err='แก้ไขไม่สำเร็จ'");
}
?>