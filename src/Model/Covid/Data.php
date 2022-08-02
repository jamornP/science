<?php
namespace App\Model\Covid;

use App\Database\DbCovid;

class Data extends DbCovid {
    public function addData($data) {
        $sql="
            INSERT INTO tb_data (
                name, 
                surname, 
                tel, 
                class, 
                mador_id, 
                date_covid, 
                remark, 
                images_id
            ) VALUES (                 
                :name, 
                :surname, 
                :tel, 
                :class, 
                :mador_id, 
                :date_covid, 
                :remark, 
                :images_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    
}
?>
