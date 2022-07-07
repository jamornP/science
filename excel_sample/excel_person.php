<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/db/db_webdev.php"); ?>
<?php require("{$_SERVER['DOCUMENT_ROOT']}/inc/excel_pack.php");?>
<?php
$title = "Export";
$sheet->setTitle($title);
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
      tb_person.cPhoto,
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

$column_head_arr = ['No.'];
foreach($data[0] as $key=>$value){
	array_push($column_head_arr,$key);
}

foreach ($column_head_arr as $key=>$column_head) {
	$sheet->SetCellValue($column_excel_arr[$key].'2',$column_head);
}
$index=count($column_head_arr) - 1;
// กำหนดค่าในแต่ละ cell
$sheet->mergeCells('A1:'.$column_excel_arr[$index].'1');
$sheet->SetCellValue('A1',$title);
$sheet->getStyle('A1:'.$column_excel_arr[$index].'2')->applyFromArray($excel_font_bold);
$sheet->getStyle('A1:'.$column_excel_arr[$index].'1')->applyFromArray($excel_bc_grey_l);
$sheet->getStyle('A2:'.$column_excel_arr[$index].'2')->applyFromArray($excel_bc_blue_d);
$num = 0;
$j = 2;

foreach($data as $value){
	$num++;
	$j++;
	$index = 0;
	$sheet->SetCellValue($column_excel_arr[$index].$j,$num);$index++;
	foreach($value as $field){
      $sheet->SetCellValueExplicit($column_excel_arr[$index].$j,$field,PHPExcel_Cell_DataType::TYPE_STRING);
      $index++;
	}
}

$index--;
$sheet->getStyle('A1:'.$column_excel_arr[$index].$j)->applyFromArray($excel_border_black);
$index = 0;
foreach ($column_head_arr as $column_head) {
	$sheet->getColumnDimension($column_excel_arr[$index])->setAutoSize(true);
	$index++;
}
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$gExcel->setActiveSheetIndex(0);

//$export_to = "Excel2007"; // 2007
$export_to = "Excel5"; // 2003
if($export_to == "Excel2007"){
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	$file_ext = ".xlsx";
}elseif($export_to == "Excel5"){
	header('Content-Type: application/vnd.ms-excel');
	$file_ext = ".xls";
}
header('Cache-Control: max-age=0');
header('Content-Disposition: attachment;filename="'.$title.'_'.date('Y-m-d_H:i:s').$file_ext.'"');
$objWriter = PHPExcel_IOFactory::createWriter($gExcel, $export_to);
$objWriter->save('php://output'); 
?>