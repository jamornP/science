<?php //require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/science/lib/TCPDF-master/tcpdf.php");?>
<?php
// https://tcpdf.org/examples/
// create new PDF document
$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);


// set font
$pdf->SetFont('thsarabun', '', 14, '', true);
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set page margin
$pdf->SetMargins(0,0,0,0);
// add a page
$pdf->AddPage();

$set_col = 3;
$set_row = 3;

$count_col = 0;
$count_row = 0;

$image_w = 35;
$image_h = 50;

$margin_r = 10;
$margin_b = 12;

for($i = 1; $i <=30; $i++){
  
    
   if($count_col >= 4){
      $count_col = 0;
      $count_row++;
   }  

   if($count_row >= 4){
      $pdf->AddPage();
      $count_col = 0;
      $count_row = 0;
   }

   // Image method signature:
   // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
   $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/ca/S_susu.png', 10+($image_w + $margin_r)*$count_col, 10+($image_h + $margin_b)*$count_row, $image_w, 0);
   $pdf->SetTextColor(0, 0, 0);
   $pdf->SetFontSize(20);
   // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
   $pdf->MultiCell($image_w, 10, "ซองจุงกิ", 0, 'C', 0, 1, 10+($image_w + $margin_r)*$count_col, 60+($image_h + $margin_b)*$count_row, '', '', true);
   $count_col++;
}



$pdf->Output('basic_image.pdf', 'I');
?>