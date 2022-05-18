<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/lib/TCPDF-master/tcpdf.php");?>
<?php
// https://tcpdf.org/examples/
// create new PDF document
$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);

// คิวรี่ข้อมูลบุคคล
require("../query/query_person_report.php");

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set font
$pdf->SetFont('thsarabun', '', 14, '', true);

foreach($data as $row){
   // add a page
   $pdf->AddPage();
   // set color for text
   $pdf->SetTextColor(0, 0, 0);
   $pdf->SetFontSize(25);
   // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
   $pdf->MultiCell(0, 10, "{$row['cPrefix']}{$row['cFname']} {$row['cLname']}", 0, 'C', 0, 1, 10, 80, '', '', true);
   
   $pdf->SetFontSize(22);
   $pdf->MultiCell(0, 10, "ได้สำเร็จการศึกษาเกียรตินิยมอันดับหนึ่ง เหรียญทอง", 0, 'C', 0, 1, 10, 95, '', '', true);
}


$pdf->Output('certificate.pdf', 'I');
?>