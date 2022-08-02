<?php
namespace App\Model\Covid;

use App\Database\DbCovid;

class Cl extends DbCovid {
    public function getAllCl() {
        $sql="
            SELECT 
                *
            FROM
                tb_class 
             
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}
?>