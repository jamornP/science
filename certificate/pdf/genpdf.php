<?php require $_SERVER['DOCUMENT_ROOT']."/science/vendor/autoload.php"?>
<?php require $_SERVER['DOCUMENT_ROOT']."/science/lib/TCPDF-master/tcpdf.php";?>
<?php 
    use App\Model\Certificate;
    $personObj = new Certificate();
    $persons = $personObj->getAllPerson();
    // echo "<pre>";
    // print_r($persons);
    // echo"</pre>";
    // $project = $persons[0]['project'];
    // echo $project;
    // if(is_dir("../../upload/$project")){
        
    // }else{
    //     mkdir("../../upload/$project");
    // }
    foreach($persons as $person){
        $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set font
        $pdf->SetFont('thsarabun', '', 14, '', true);
        // set page margin
        $pdf->SetMargins(0,0,0,0);

    

    
        $name = $person['title'].$person['name']." ".$person['surname'];
        // add a page
        $pdf->AddPage();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = $_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/certificate-BG.png';
        $pdf->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
        //ลายเซ็นต์ CA
        $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/ca/susu.png', 110, 135,0 , 50, '', '', '', false, 300, '', false, false, 0);
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
        $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 90);
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

        //สร้างไฟล์ path
        $filename= $person['t_num']."-".$person['project'].".pdf"; 
        $filelocation = $_SERVER['DOCUMENT_ROOT'].'/science/upload/';//windows
        // $filelocation = "/var/www/project/custom"; //Linux

        $fileNL = $filelocation."/".$filename;//Windows
        // $fileNL = $filelocation."/".$filename; //Linux

        $serv = "http://161.246.13.229/science/upload/".$filename;

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
        $pdf->write2DBarcode($serv, 'QRCODE,M', 260, 172, 30, 30, $style, 'N');

        //สร้าง pdf file
        // $pdf->lastPage();
         $pdf->Output($fileNL, 'F');
        
    }
    
    $pdfi = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
        // remove default header/footer
        $pdfi->setPrintHeader(false);
        $pdfi->setPrintFooter(false);
        // set font
        $pdfi->SetFont('thsarabun', '', 14, '', true);
        // set page margin
        $pdfi->SetMargins(0,0,0,0);

    
        foreach($persons as $person){
    
        $name = $person['title'].$person['name']." ".$person['surname'];
        // add a page
        $pdfi->AddPage();
        // disable auto-page-break
        $pdfi->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = $_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/certificate-BG.png';
        $pdfi->Image($img_file, 0, 0, 0, 210, '', '', '', false, 300, '', false, false, 0);
        //ลายเซ็นต์ CA
        $pdfi->Image($_SERVER['DOCUMENT_ROOT'].'/science/certificate/background/ca/susu.png', 110, 135,0 , 50, '', '', '', false, 300, '', false, false, 0);
        // Print a text
        $pdfi->SetFont('thsarabun', 'B');
        $pdfi->SetTextColor(28,46,75);
        $pdfi->SetFontSize(42);
        $pdfi->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 45);
        $pdfi->SetFontSize(32);
        $pdfi->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 60);

        $pdfi->SetFont('thsarabun', '');
        $pdfi->SetTextColor(0,0,0);
        $pdfi->SetFontSize(24);
        $pdfi->MultiCell(0, 0, "เกียรติบัตรฉบับนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 73);

        $pdfi->SetFont('thsarabun', 'B');
        $pdfi->SetFontSize(42);
        $pdfi->SetTextColor(28,46,75);
        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
        $pdfi->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 90);
        $pdfi->SetFontSize(28);
        $pdfi->MultiCell(0, 0, 'ได้เข้าร่วมโครงการ "เรียนวิดยายังไงให้ปัง" เพื่อการแนะนำการศึกษาในศตวรรษที่ 21', 0, 'C', 0, 1, 0, 115);


        $pdfi->SetFont('thsarabun', '');
        $pdfi->SetTextColor(0,0,0);
        $pdfi->SetFontSize(24);
        $pdfi->MultiCell(0, 0, "ให้ ณ วันที่ 10 พฤษภาคม พ.ศ. 2565", 0, 'C', 0, 1, 0, 128);

        $pdfi->SetFont('thsarabun', '');
        $pdfi->SetTextColor(0,0,0);
        $pdfi->SetFontSize(18);
        $pdfi->MultiCell(0, 0, "รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร", 0, 'C', 0, 1, 0, 172);
        $pdfi->SetFont('thsarabun', '');
        $pdfi->SetTextColor(0,0,0);
        $pdfi->SetFontSize(18);
        $pdfi->MultiCell(0, 0, "คณบดีคณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 180);
        $pdfi->SetFont('thsarabun', '');
        $pdfi->SetTextColor(0,0,0);
        $pdfi->SetFontSize(18);
        $pdfi->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 188);

        //สร้างไฟล์ path
        $filename= $person['t_num']."-".$person['project'].".pdf"; 
        $filelocation = $_SERVER['DOCUMENT_ROOT'].'/science/upload/';//windows
        // $filelocation = "/var/www/project/custom"; //Linux

        $fileNL = $filelocation."/".$filename;//Windows
        // $fileNL = $filelocation."/".$filename; //Linux

        $serv = "http://161.246.13.229/science/upload/".$filename;

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
        $pdfi->write2DBarcode($serv, 'QRCODE,M', 260, 172, 30, 30, $style, 'N');
    }
    $pdfi->Output('pdf-test.pdf', 'I');
    
?>
