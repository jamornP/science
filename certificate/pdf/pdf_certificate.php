<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/lib/TCPDF-master/tcpdf.php");?>
<?php
$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set font
$pdf->SetFont('thsarabun', '', 14, '', true);


// set page margin
$pdf->SetMargins(0,0,0,0);

// set color for text
$pdf->SetTextColor(0, 0, 0);
require("../query/query_person_report.php");
foreach($data AS $item){
   // add a page
   $pdf->AddPage();
   
   $pdf->SetFontSize(24);
   // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='')
   $pdf->MultiCell(0, 0, "{$item['cPrefix']}{$item['cFname']} {$item['cLname']}", 0, 'C', 0, 1, 0, 80);
   
   $pdf->SetFontSize(21);
   $pdf->MultiCell(0, 0, "ได้ผ่านการอบรมโครงการ ระดับ ดีมาก", 0, 'C', 0, 1, 0, 95);
}



$pdf->Output('certificate.pdf', 'I');
?>