<?php
print_r($_REQUEST);
?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/sciday/auth/auth.php";?>
<?php 
use App\Model\Sciday\Answer;
$answerObj = new Answer;
use App\Model\Sciday\Student;
$studentObj = new Student;  
use App\Model\Sciday\Teacher;
$teacherObj = new Teacher;  

$ckt = $teacherObj->delTeacherById($_REQUEST['tea_id']);
$cks = $studentObj->delStudentById($_REQUEST['stu_id']);
if($ckt AND $cks){
    $cka = $answerObj->delAnswerById($_REQUEST['id']);
}
header("location: /science/sciday/pages/");
?>