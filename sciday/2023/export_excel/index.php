<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php";?>
<?php //require $_SERVER['DOCUMENT_ROOT']."/science/lib/PHPExcel/excel_pack.php";?>
<?php
session_start();
use App\Model\Sciday2023\Auth;
$authObj = new Auth;
use App\Model\Sciday2023\Admin;
$adminObj = new Admin;
date_default_timezone_set('Asia/Bangkok');
// --------------------------------------
// $sheetname = $levelname['name'];
// $sheet->setTitle($sheetname);
$ac_id = $_GET['ac_id'];
$le_id = $_GET['le_id'];
$data = $adminObj->getProjectByActivityLevel("data", $ac_id, $le_id);
// $data = $projectObj->getProjectByLevel($_REQUEST['level_id']);
echo "<pre>";
print_r($data);
echo "</pre>";

// $column_head_arr = ['ลำดับ','ชื่อโครงงาน','โรงเรียน','นักเรียน','อาจารย์ที่ปรึกษา','เบอร์โทร'];
// foreach($column_head_arr AS $k => $item){
//       $sheet->SetCellValue("{$column_excel_arr[$k]}2",$item);
// }
// /*
// $sheet->SetCellValue("A2","ลำดับ");
// $sheet->SetCellValue("B2","ชื่อ");
// $sheet->SetCellValue("C2","นามสกุล");
// $sheet->SetCellValue("D2","ชื่อเล่น");
// $sheet->SetCellValue("e2","หน่วยงาน");
// */
// /*
// foreach ($column_head_arr as $key=>$column_head) {
// 	$sheet->SetCellValue($column_excel_arr[$key].'2',$column_head);
// }
// */
// $count_column=count($column_head_arr); // 5
// $excel_column_end = $column_excel_arr[$count_column-1]; // E
// // กำหนดค่าในแต่ละ cell

// $title = "การประกวดโครงงานวิทยาศาสตร์";
// $sheet->SetCellValue('A1',$title);
// $sheet->mergeCells('A1:'.$excel_column_end .'1');
// $sheet->getStyle('A1:'.$excel_column_end.'2')->applyFromArray($excel_font_bold);
// $sheet->getStyle('A1:'.$excel_column_end.'1')->applyFromArray($excel_bc_grey_l);
// $sheet->getStyle('A2:'.$excel_column_end.'2')->applyFromArray($excel_bc_blue_l);

// $num = 0;
// $j = 2;//บันทัด
// $jj = 2;//ใช้เก็บนักเรียน
// $jjj = 2;//ใช้เก็บอาจารย์
// $jjjj = 2;//ใช้เก็บบันทัดแรก
// foreach($data as $value){
// 	$num++;
//    $students = $studentObj->getStuById($value['student_id']);
//    $teachers = $teacherObj->getTeacherById($value['teacher_id']);
// 	$j++;
// 	$jjjj=$j;
// 	$index = 0;

//    $sheet->SetCellValue($column_excel_arr[$index].$j,$num);$index++;
//    $sheet->SetCellValue($column_excel_arr[$index].$j,$value['project_name']);$index++;
//    $sheet->SetCellValue($column_excel_arr[$index].$j,$value['school']);$index++;
//    $jj=$j;
//    $snum =0;
//    foreach($students AS $stu){
//         $snum++;
//         $studentname = $snum.". ".$stu['stitle'].$stu['sname']." ".$stu['ssurname'];
//         $sheet->SetCellValue($column_excel_arr[$index].$jj,$studentname);
//         $jj++;
//    }
//    $index++;
//    $jjj=$j;
//    $tnum =0;
//    foreach($teachers AS $tea){
//     $tnum++;
//       $teachername = $tnum.". ".$tea['ttitle'].$tea['tname']." ".$tea['tsurname'];
//       $sheet->SetCellValue($column_excel_arr[$index].$jjj,$teachername);
//       $jjj++;
//    }
//    $index++;
   
   
//    $sheet->SetCellValue($column_excel_arr[$index].$j,$value['tel']);$index++;
//    if($jj > $jjj){
//       $j = $jj-1;
//    }elseif($jj = $jjj){
//       $j = $jj-1;
//    }else{
//         $j = $jjj-1;
//    }
// //    $sheet->mergeCells($column_excel_arr[0].$jjjj.':'.$column_excel_arr[0].$j);
// //    $sheet->mergeCells($column_excel_arr[1].$jjjj.':'.$column_excel_arr[1].$j);
// //    $sheet->mergeCells($column_excel_arr[2].$jjjj.':'.$column_excel_arr[2].$j);
// //    $sheet->mergeCells($column_excel_arr[5].$jjjj.':'.$column_excel_arr[5].$j);
// }


// $sheet->getStyle('A1:'.$excel_column_end.$j)->applyFromArray($excel_border_black);
// $index = 0;
// foreach ($column_head_arr as $column_head) {
// 	$sheet->getColumnDimension($column_excel_arr[$index])->setAutoSize(true);
// 	$index++;
// }
// $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $sheet->getStyle('A2:'.$excel_column_end.'2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $sheet->getStyle('A3:A'.$j)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $sheet->getStyle('A3:A'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $sheet->getStyle($column_excel_arr[5].'3:'.$column_excel_arr[5].$j)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// $sheet->getStyle($column_excel_arr[5].'3:'.$column_excel_arr[5].$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// $gExcel->setActiveSheetIndex(0);

// //$export_to = "Excel2007"; // 2007
// $export_to = "Excel2007"; // 2003
// if($export_to == "Excel2007"){
// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// 	$file_ext = ".xlsx";
// }elseif($export_to == "Excel5"){
// 	header('Content-Type: application/vnd.ms-excel');
// 	$file_ext = ".xls";
// }
// header('Cache-Control: max-age=0');
// header('Content-Disposition: attachment;filename="'.$title.'_'.date('Y-m-d_H:i:s').$file_ext.'"');
// $objWriter = PHPExcel_IOFactory::createWriter($gExcel, $export_to);
// $objWriter->save('php://output'); 
?>