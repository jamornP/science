<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Status extends DbRepair {
    public function getStatus() {
        $sql = "
            SELECT 
                *
            FROM
                tb_status
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>