<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/lib/TCPDF-master/tcpdf.php";?>
<?php 
    use App\Model\Tcas66\Certificate;
    $personObj = new Certificate;
    $persons = $personObj->getCerByProject(' กิจกรรมอบรมพื้นฐานวิทยาศาสตร์และการเตรียมตัวเพื่อศึกษาต่อในระดับอุดมศึกษา');
    // echo "<pre>";
    // print_r($persons);
    // echo"</pre>";
    // $project = $persons[0]['project'];
    // echo $project;
    // if(is_dir("/science/upload/sciday/certificate")){
        
    // }else{
    //     mkdir("/science/upload/sciday/certificate");
    // }
    $i=0;
    foreach($persons as $person){
        $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set font
        $pdf->SetFont('thsarabun', '', 14, '', true);
        // set page margin
        $pdf->SetMargins(0,0,0,0);

    

    
        $i++;
        
        $name = $person['title'].$person['name']." ".$person['surname'];
        // add a page
        $pdf->AddPage('L','A4');
        // disable auto-page-break //false หน้าเดียว //true หลายยหน้า
        $pdf->SetAutoPageBreak(true, 0);
        // set bacground image
        $img_file = $_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/sciday2022.png';
        $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
        //ลายเซ็นต์ CA
        $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/ca/susu.png', 110, 147,0 , 50, '', '', '', false, 300, '', false, false, 0);
        // Print a text
        $pdf->SetFont('thsarabun', 'B');
        $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(36);
        $pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 40);
        $pdf->SetFontSize(28);
        $pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 53);

        $pdf->SetFont('thsarabun', '');
        $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(24);
        $pdf->MultiCell(0, 0, "ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 65);

        $pdf->SetFont('thsarabun', 'B');
        $pdf->SetFontSize(36);
        $pdf->SetTextColor(28,46,75);
        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
        $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 78);
       
        $pdf->SetFont('thsarabun', '');
        $pdf->SetFontSize(28);
        $pdf->MultiCell(0, 0, "โรงเรียน".$person['school'], 0, 'C', 0, 1, 0, 92);

        $pdf->SetFont('thsarabun', 'B');
        // $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(34);
        $pdf->MultiCell(0, 0, 'ได้เข้าร่วม และผ่านเกณฑ์การทำแบบทดสอบ', 0, 'C', 0, 1, 0, 110);
        // $pdf->SetFont('thsarabun', 'B');
        // $pdf->SetTextColor(28,46,75);
        // $pdf->SetFontSize(30);
        // $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 122);

        $pdf->SetFont('thsarabun', 'B');
        $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(30);
        $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 127);


        $pdf->SetFont('thsarabun', 'B');
        $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(30);
        $pdf->MultiCell(0, 0, "วันที่ 6 ธันวาคม พ.ศ. 2565", 0, 'C', 0, 1, 0, 142);

        $pdf->SetFont('thsarabun', '');
        $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(18);
        $pdf->MultiCell(0, 0, "(รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร)", 0, 'C', 0, 1, 0, 182);
        $pdf->SetFont('thsarabun', '');
        $pdf->SetTextColor(0,98,133);
        $pdf->SetFontSize(18);
        $pdf->MultiCell(0, 0, "คณบดี คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 188);
        

        //สร้างไฟล์ path
        $ra = uniqid();
        $filename="tcas66-".$ra.".pdf"; 
        $filelocation = $_SERVER['DOCUMENT_ROOT'].'\\science\\upload\\cer1\\';//windows
        // $filelocation = "$_SERVER['DOCUMENT_ROOT'].'/science/upload/cer1/"; //Linux

        $fileNL = $filelocation."\\".$filename;//Windows
        // $fileNL = $filelocation."/".$filename; //Linux

        $serv = "http://161.246.23.21/science/upload/cer1/".$filename;

        //QR Code
        $style = [
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => [0,0,0],
            'bgcolor' => [247,247,247],
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        ];
        // QRCODE,M : QR-CODE Medium error correction
        $pdf->write2DBarcode($serv, 'QRCODE,M', 20, 172, 30, 30, $style, 'N');

        //สร้าง pdf file 'F' eletronic 'I'
        //$pdf->lastPage();
        
        $pdf->Output($fileNL, 'F');
        $dataU['id']=$person['id'];
        $dataU['file_cer']=$serv;
        print_r($dataU);
        $up = $personObj->updateCer($dataU);
    }
   
  
    $pdf->Close();
    
?>
