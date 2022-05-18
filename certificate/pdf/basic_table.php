<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/lib/TCPDF-master/tcpdf.php");?>
<?php
// https://tcpdf.org/examples/
// create new PDF document
$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set font
$pdf->SetFont('thsarabun', '', 14, '', true);

// add a page
$pdf->AddPage();

// set color for text
$pdf->SetTextColor(0, 63, 127);
// set color for background
$pdf->SetFillColor(247, 255, 163);

$pdf->SetFontSize(21);
$pdf->SetFont('', 'B');
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
$pdf->Cell(0, 0, "รายชื่อสมาชิก IBS", 0, 1, 'C', 1);


$pdf->Ln(4);

$pdf->SetFontSize(16);
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFillColor(181, 255, 205);
$pdf->SetDrawColor(183, 5, 35);


$pdf->Cell(25, 0, "ลำดับ", 1, 0, 'C', 1);
$pdf->Cell(50, 0, "คำนำ", 1, 0, 'C', 1);
$pdf->Cell(50, 0, "ชื่อ", 1, 0, 'C', 1);
$pdf->Cell(50, 0, "นามสกุล", 1, 0, 'C', 1);
$pdf->Cell(50, 0, "ชื่อเล่น", 1, 0, 'C', 1);
$pdf->Cell(50, 0, "หน่วยงาน", 1, 0, 'C', 1);
$pdf->Ln();


$pdf->SetFont('');
$pdf->SetFillColor(255, 255, 255);
$sql = "
SELECT
   tb_person.nId_person,
   tb_person.nId_prefix,
   tb_prefix.cName AS cPrefix,
   tb_person.cFname,
   tb_person.cLname,
   tb_person.cNickname,
   tb_person.dBirthdate,
   tb_person.nId_department,
   tb_department.cDepartment,
   tb_gender.cName AS cGender,
   tb_ptype.cName AS cPerson_type
FROM
   tb_person   
   LEFT JOIN tb_ref AS tb_prefix ON tb_person.nId_prefix = tb_prefix.nId_ref
   LEFT JOIN tb_ref AS tb_gender ON tb_person.nId_gender = tb_gender.nId_ref
   LEFT JOIN tb_ref AS tb_ptype ON tb_person.nId_person_type = tb_ptype.nId_ref
   LEFT JOIN tb_department ON tb_person.nId_department = tb_department.nId_department
WHERE 
   tb_person.nId_person > 0
   
";
$data = $db->select($sql);
$num=0;
foreach($data as $value){
   $num++;
   $pdf->Cell(25, 0,$num, 1, 0, 'C', 1);
   $pdf->Cell(50, 0,$value['cPrefix'], 1, 0, 'C', 1);
   $pdf->Cell(50, 0,$value['cFname'], 1, 0, 'C', 1);
   $pdf->Cell(50, 0,$value['cLname'], 1, 0, 'C', 1);
   $pdf->Cell(50, 0,$value['cNickname'], 1, 0, 'C', 1);
   $pdf->Cell(50, 0,$value['cDepartment'], 1, 0, 'C', 1);
   $pdf->Ln();
}

$pdf->Output('basic_table.pdf', 'I');
?>