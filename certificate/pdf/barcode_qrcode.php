<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/lib/TCPDF-master/tcpdf.php");?>
<?php
// create new PDF document
$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);

$pdf->SetFont('thsarabun', '', 14, '', true);


$pdf->AddPage();


// define barcode style
$style = [
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => [0,0,0],
    'bgcolor' => false,
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
];
$pdf->Cell(0, 0, 'CODE 128', 0, 1);
$pdf->write1DBarcode('289076', 'C128', '', '', '', 25, 0.4, $style, 'N');



$style = [
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => [0,0,0],
    'bgcolor' => false,
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
];
// QRCODE,M : QR-CODE Medium error correction
$pdf->write2DBarcode('http://www.ibsone.com/ibsone/apps/bike/qr/index.php?id=52', 'QRCODE,M', 70, 60, 50, 50, $style, 'N');

$pdf->Text(20, 55, 'รหัสรถจักรยาน');


$pdf->Output('basic_qr.pdf', 'I');
?>