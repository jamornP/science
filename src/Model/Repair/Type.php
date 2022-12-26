<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Type extends DbRepair {
    public function getType() {
        $sql = "
            SELECT 
                *
            FROM
                tb_type
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>