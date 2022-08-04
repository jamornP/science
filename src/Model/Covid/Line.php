<?php
namespace App\Model\Covid;
use App\Database\DbCovid;

class Line extends DbCovid {
    public function getDatarById($id) {
        $sql = "
            SELECT 
                d.name,
                d.surname,
                d.tel,
                d.stu_num,
                d.date_covid,
                d.remark,
                d.images_id ,
                d.date_add,
                c.name as class,
                m.name as magor,
                de.name as department
            FROM 
                `tb_data` as d
                LEFT JOIN tb_class as c ON c.id = d.class_id
                LEFT JOIN tb_magor as m ON m.id = d.magor_id
                LEFT JOIN tb_department as de ON de.id = m.d_id
            WHERE 
                d.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function SentLine($id) {

        $stu = $this->getDatarById($id);
        $date_covid = date_format(date_create($stu['date_covid']),"d-m-Y");
        $data="รายใหม่\nชื่อ : ".$stu['name']." ".$stu['surname']."\nรหัส : ".$stu['stu_num']."\nเบอร์ : ".$stu['tel']."\nสาขา : ".$stu['magor']."\nภาค : ".$stu['department']."\nวันที่ทราบผลตรวจ : ".$date_covid."\nรายละเอียดห้อง : ".$stu['remark']."\nLink : https://bit.ly/3d5wng0" ;
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");
    
            $sToken = "Bmiw79Ksfx4360DtFgwXqaRE9TXs1mp3FCsX4Y5Uzsd";
            $sMessage = "$data";
    
    
            $chOne = curl_init(); 
            curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
            curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt( $chOne, CURLOPT_POST, 1); 
            curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
            $result = curl_exec( $chOne ); 
    
            //Result error 
            if(curl_error($chOne)) 
            { 
                echo 'error:' . curl_error($chOne); 
            } 
            else { 
                $result_ = json_decode($result, true); 
                // echo "status : ".$result_['status']; echo "message : ". $result_['message'];
            } 
            curl_close( $chOne );  
    }
    
}
?>