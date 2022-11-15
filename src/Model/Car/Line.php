<?php
namespace App\Model\Car;
use App\Database\DbCar;
class Line extends DbCar {

    public function CountStatus1(){
        $sql[]="
            SELECT * 
            FROM `tb_bs` 
            WHERE s_id = 1
            GROUP BY b_id
        ";
        $sql[]="
            SELECT * 
            FROM `tb_bs` 
            WHERE s_id = 2
            GROUP BY b_id
        ";
        $sql[]="
            SELECT *
            FROM `tb_bs` 
            WHERE s_id = 3
            GROUP BY b_id
            
        ";
        $sql[]="
            SELECT * 
            FROM `tb_bs` 
            WHERE s_id = 4
            GROUP BY b_id
        ";
        $sql[]="
            SELECT * 
            FROM `tb_book` 
            WHERE c_id = 1
        ";
        $sql[]="
            SELECT * 
            FROM `tb_book`
        ";
        $i=0;
        foreach($sql as $da){
            $stmt = $this->pdo->query($da);
            $data[$i] = $stmt->rowCount();
            $i++;
        }
        return $data;

    }
    public function SentLine($name,$dates) {
        $dataCount = $this->CountStatus1();
        $data=" รถสถาบัน\nขอใช้รถ/คณะส่งเรื่องออก =: ".$dataCount[0]."/".$dataCount[1]."\nขอใช้รถ/อนุมัติ:ไม่อนุมัติ =: ".$dataCount[0]."/".$dataCount[2].":".$dataCount[3]."\nขอใช้รถตู้คณะฯ พี่อภิสิทธิ์ =: ".$dataCount[4]."\n---------------------\nรวมทั้งหมด/รถคณะฯ : รถสถาบันฯ =: ".$dataCount[5]."/".$dataCount[4].":".$dataCount[0]."\nLink : http://161.246.23.21/car/\n".$name."\nวันที่ ".$dates ;
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");
    
            $sToken = "i6cOzK2rT6c6tDE1aQsDPlb8ANrZ7phzOQ4VgkADXlV";
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
    public function SentLineSci($name,$dates) {
        $dataCount = $this->CountStatus1();
        $data="\nขอใช้รถตู้คณะฯ พี่อภิสิทธิ์ =: ".$dataCount[4]."\n---------------------\nรวมทั้งหมด/รถคณะฯ : รถสถาบันฯ =: ".$dataCount[5]."/".$dataCount[4].":".$dataCount[0]."\nLink : http://161.246.23.21/car/\n".$name."\nวันที่ ".datethai($dates)  ;
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");
    
            $sToken = "i6cOzK2rT6c6tDE1aQsDPlb8ANrZ7phzOQ4VgkADXlV";
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
