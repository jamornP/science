<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/lib/TCPDF-master/tcpdf.php");?>
<?php
// https://tcpdf.org/examples/
// create new PDF document
// P = Portrait   L = Landscape
// mm = millimetre
$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set font
$pdf->SetFont('thsarabun', '', 14, '', true);

// set page margin
$pdf->SetMargins(0,0,0,0);
// add a page
$pdf->AddPage();

// set color for background
$pdf->SetFillColor(255, 251, 147);
// set color for text
$pdf->SetTextColor(242, 33, 54);
// set font size
$pdf->SetFontSize(25);
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
$pdf->Cell(50, 0, 'Hello PDF', 1, 1, 'R', 0);

// เว้นบรรทัด
$pdf->Ln(5);

$pdf->SetFontSize(15);
$pdf->SetFillColor(100, 205, 150);
$pdf->Cell(50, 0, 'How are you?', 1, 1, 'C', 1);


// set color for background
$pdf->SetFillColor(50, 255, 200);
$pdf->Cell(40, 0, 'สบายดีบ่อ?', 0, 1, 'C', 1);


$pdf->Ln(5);


$pdf->Output('basic_cell.pdf', 'I');
?>