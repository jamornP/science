<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/claviska/simpleimage/src/claviska/SimpleImage.php"?>
<?php
echo "
    <h4>ข้อมูลทีมที่สมัคร</h4>
    <p>ชื่อโรงเรียน {$_REQUEST['school']}</p>
    <p>ผู้เข้าประกวด </p>
    <ol>
";
foreach ($_REQUEST['name'] as $key => $name) {
    echo "
        <li>    
            <p> {$name}</p>
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