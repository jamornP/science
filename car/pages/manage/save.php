<?php require $_SERVER['DOCUMENT_ROOT']."/science/car/auth/auth.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php
use App\Model\Car\Book;
use App\Model\Car\Bs;
$bookObj = new Book;
$bsObj = new Bs;
use App\Model\Car\Line;
$lineObj = new Line;

$_REQUEST['user_add'] = $_SESSION['email'];
// print_r($_REQUEST);
$bsObj->addBs($_REQUEST);
$namere=$_SESSION['name']." ".$_SESSION['surname'];
$dates = $_REQUEST['start_date'];
$lineObj->SentLine($namere,$dates);


$book = $_REQUEST;
unset($book['sname']);
unset($book['tel']);
unset($book['user_add']);
unset($book['number']);
$bookObj->updateBookStatus($book);
header('Location: /science/car/pages/book/index.php');
?>