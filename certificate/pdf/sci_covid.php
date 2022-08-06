<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/lib/TCPDF-master/tcpdf.php";?>
<?php 
    use App\Model\Covid\Data;
    $dataObj = new Data();
    
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

$pdf->SetFontSize(18);
$pdf->SetFont('', 'B');
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
$pdf->Cell(0, 0, "ข้อมูลผู้ติดเชื้อ COVID-19 วันที่ ".$_REQUEST['date'], 0, 1, 'C', 1);


$pdf->Ln(4);

$pdf->SetFontSize(14);
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFillColor(181, 255, 205);
$pdf->SetDrawColor(183, 5, 35);


$pdf->Cell(10, 0, "ลำดับ", 1, 0, 'C', 1);
$pdf->Cell(25, 0, "รหัสนักศึกษา", 1, 0, 'C', 1);
$pdf->Cell(50, 0, "ชื่อ-สกุล", 1, 0, 'C', 1);
$pdf->Cell(30, 0, "เบอร์โทร", 1, 0, 'C', 1);
$pdf->Cell(65, 0, "สาขา", 1, 0, 'C', 1);
$pdf->Cell(55, 0, "ภาควิชา", 1, 0, 'C', 1);
$pdf->Cell(10, 0, "ชั้นปี", 1, 0, 'C', 1);
$pdf->Cell(30, 0, "วันที่ทราบผล", 1, 0, 'C', 1);
$pdf->Ln();


$pdf->SetFont('');
$pdf->SetFillColor(255, 255, 255);
$datas = $dataObj->getAllDataByDate($_REQUEST['date1'],$_REQUEST['date2']);
$i=0;
foreach($datas as $value){
    $i++;
    $pdf->Cell(10, 0, $i, 1, 0, 'C', 1);
    $pdf->Cell(25, 0, $value['stu_num'], 1, 0, 'C', 1);
    $pdf->Cell(50, 0, $value['name']." ".$value['surname'], 1, 0, 'L', 1);
    $pdf->Cell(30, 0, $value['tel'], 1, 0, 'C', 1);
    $pdf->Cell(65, 0, $value['magor'], 1, 0, 'C', 1);
    $pdf->Cell(55, 0, $value['department'], 1, 0, 'C', 1);
    $pdf->Cell(10, 0, $value['class'], 1, 0, 'C', 1);
    $pdf->Cell(30, 0, $value['date_covid'], 1, 0, 'C', 1);
    $pdf->Ln();
}
$pdf->SetFontSize(14);
$pdf->SetFont('', '');
//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
$pdf->Cell(0, 0, "วันที่พิมพ์รายงาน ".date("Y-m-d"), 0, 1, 'R', 1);
$pdf->Output('basic_table.pdf', 'I');
?>
