<?php //require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/science/lib/TCPDF-master/tcpdf.php");?>
<?php
// https://tcpdf.org/examples/
// create new PDF document
$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);

$pdf->SetFont('thsarabun', '', 14, '', true);

// คิวรี่ข้อมูลบุคคล
require("../query/query_person_report.php");

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// add a page
$pdf->AddPage();

// ตั้งค่าจำนวนคอลัมน์ และจำนวนบรรทัดต่อหน้า
$set_col=2;
$set_row=4;

// ตั้งค่าระยะห่างระหว่างชิ้น
$shift_x= 95;
$shift_y = 70;

// ตั้งค่าเริ่มนับคอลัมน์และบรรทัด
$count_col = 0;
$count_row = 0;

// วนลูป
foreach($data as $item){
	
	// ถ้าคอลัมน์มากกว่าที่ตั้งไว้ ให้เริ่มบรรทัดใหม่
	if($count_col >= $set_col){ // $set_col= 2
		//นับบรรทัดเพิ่ม
		$count_row++;
		//เริ่มคอลัมน์ใหม่
		$count_col=0;
	}
	
	// ถ้าบรรทัดมากกว่าที่ตั้งไว้  ให้เริ่มหน้าใหม่ บรรทัดใหม่
	if($count_row >= $set_row){ // $set_row = 4
		//เปิดหน้าใหม่
		$pdf->AddPage();
		//เริ่มคอลัมน์ และบรรทัดใหม่
		$count_col = 0;
		$count_row = 0;
	}	


	// ใส่รูปภาพ
	if($item['cPhoto']){
		$pdf->Image($_SERVER['DOCUMENT_ROOT'].$item['cPhoto'], 15+$shift_x*$count_col, 10+$shift_y*$count_row, 25, 0, '');
	}
	$pdf->SetDrawColor(0, 0, 0);
	$pdf->Rect(10+$shift_x*$count_col, 7+$shift_y*$count_row,90,60);
	
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFontSize(18);

	$pdf->MultiCell(55, 10, "บัตรประจำตัวสมาชิก WebDev", 0, 'C', 0, 1, 42+$shift_x*$count_col, 10+$shift_y*$count_row, '', '', true);

	// ชื่อ สกุล
	$pdf->MultiCell(55, 10, "{$item['cPrefix']}{$item['cFname']} {$item['cLname']}", 0, 'C', 0, 1, 42+$shift_x*$count_col, 20+$shift_y*$count_row, '', '', true);

	// หน่วยงาน
	$pdf->MultiCell(55, 10, "{$item['cDepartment']}", 0, 'C', 0, 1, 42+$shift_x*$count_col, 30+$shift_y*$count_row, '', '', true);

	// ชื่อเล่น
	$pdf->MultiCell(25, 10, "{$item['cNickname']}", 0, 'C', 0, 1, 15+$shift_x*$count_col, 45+$shift_y*$count_row, '', '', true);


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
  $pdf->write2DBarcode("http://www.ibsone.com/ibsone/apps/bike/qr/index.php?id={$item['nId_person']}", 'QRCODE,M', 75+$shift_x*$count_col, 45+$shift_y*$count_row, 20, 20, $style, 'N');   

	// นับคอลัมน์เพิ่ม
	$count_col++;	
}