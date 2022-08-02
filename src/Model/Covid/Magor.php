<?php
namespace App\Model\Covid;

use App\Database\DbCovid;

class Magor extends DbCovid {
    public function getAllMagor() {
        $sql="
            SELECT 
                m.id,
                m.name,
                m.d_id ,
                d.name AS department
            FROM
                tb_magor AS m
                LEFT JOIN tb_department AS d ON d.id = m.d_id
            ORDER BY 
                m.name  
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}
?>