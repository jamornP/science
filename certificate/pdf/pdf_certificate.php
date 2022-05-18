<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/science/lib/TCPDF-master/tcpdf.php");?>
<?php 
 use App\Model\Certificate;
 $personObj = new Certificate();   
?>
<?php

$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set font
$pdf->SetFont('thsarabun', '', 14, '', true);

// set page margin
$pdf->SetMargins(0,0,0,0);


// set bacground image
// $img_file = $_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/certificate-BG.png';
// $img_file = 'https://i.ytimg.com/vi/iB5Y41yV1dA/maxresdefault.jpg';


// add a page
$pdf->AddPage();
// get the current page break margin
// $bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
// $auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = $_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/certificate-BG.png';
$pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
$pdf->Image($_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/ca/susu.png', 110, 135,0 , 50, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
// $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
// $pdf->setPageMark();

// Print a text
$pdf->SetFont('thsarabun', 'B');
$pdf->SetTextColor(28,46,75);
$pdf->SetFontSize(42);
$pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 45);
$pdf->SetFontSize(32);
$pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 60);

$pdf->SetFont('thsarabun', '');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(24);
$pdf->MultiCell(0, 0, "เกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 73);

$pdf->SetFont('thsarabun', 'B');
$pdf->SetFontSize(42);
$pdf->SetTextColor(28,46,75);
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$pdf->MultiCell(0, 0, "นายจามร เพ็งสวย", 0, 'C', 0, 1, 0, 90);
$pdf->SetFontSize(28);
$pdf->MultiCell(0, 0, 'ได้เข้าร่วมโครงการ "เรียนวิดยายังไงให้ปัง" เพื่อการแนะนำการศึกษาในศตวรรษที่ 21', 0, 'C', 0, 1, 0, 115);


$pdf->SetFont('thsarabun', '');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(24);
$pdf->MultiCell(0, 0, "ให้ ณ วันที่ 10 พฤษภาคม พ.ศ. 2565", 0, 'C', 0, 1, 0, 128);




$pdf->SetFont('thsarabun', '');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(18);
$pdf->MultiCell(0, 0, "รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร", 0, 'C', 0, 1, 0, 172);
$pdf->SetFont('thsarabun', '');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(18);
$pdf->MultiCell(0, 0, "คณบดีคณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 180);
$pdf->SetFont('thsarabun', '');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(18);
$pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 188);


//สร้างไฟล์
$filename= "123.pdf"; 
$filelocation = $_SERVER['DOCUMENT_ROOT'].'\\science\\upload\\';//windows
// $filelocation = "/var/www/project/custom"; //Linux

$fileNL = $filelocation."\\".$filename;//Windows
// $fileNL = $filelocation."/".$filename; //Linux


//QR Code
$style = [
   'border' => 0,
   'vpadding' => 'auto',
   'hpadding' => 'auto',
   'fgcolor' => [0,0,0],
   'bgcolor' => false,
   'module_width' => 1, // width of a single module in points
   'module_height' => 1 // height of a single module in points
];
// QRCODE,M : QR-CODE Medium error correction
$pdf->write2DBarcode('http://161.246.13.229/science/upload/'.$filename, 'QRCODE,M', 260, 172, 30, 30, $style, 'N');

//สร้าง pdf
$pdf->Output($fileNL, 'F');
// $pdf->Output($fileNL, 'I');

?>