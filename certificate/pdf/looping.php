<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/lib/TCPDF-master/tcpdf.php");?>
<?php
// https://tcpdf.org/examples/
// create new PDF document
$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// add a page
$pdf->AddPage();

// ตั้งค่าจำนวนคอลัมน์ และจำนวนบรรทัดต่อหน้า
$set_col=3;
$set_row=3;

// ตั้งค่าระยะห่างระหว่างชิ้น
$shift_x= 60;
$shift_y = 80;

// ตั้งค่าเริ่มนับคอลัมน์และบรรทัด
$count_col = 0;
$count_row = 0;

// วนลูป
for($i=1; $i<=18;$i++){
	
	// ถ้าคอลัมน์มากกว่าที่ตั้งไว้ ให้เริ่มบรรทัดใหม่
	if($count_col >= $set_col){
		//นับบรรทัดเพิ่ม
		$count_row++;
		//เริ่มคอลัมน์ใหม่
		$count_col=0;
	}
	
	// ถ้าบรรทัดมากกว่าที่ตั้งไว้  ให้เริ่มหน้าใหม่ บรรทัดใหม่
	if($count_row >= $set_row){
		//เปิดหน้าใหม่
		$pdf->AddPage();
		//เริ่มคอลัมน์ และบรรทัดใหม่
		$count_col = 0;
		$count_row = 0;
	}	

	// ใส่รูปภาพ
	$pdf->Image($_SERVER['DOCUMENT_ROOT'].'/img/person/sonjung.jpg', 15+$shift_x*$count_col, 10+$shift_y*$count_row, 50, 0, '');

	// นับคอลัมน์เพิ่ม
	$count_col++;	
}

// แสดงผลลัพท์
$pdf->Output('basic_looping.pdf', 'I');
?>