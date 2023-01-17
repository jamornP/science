<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Nature extends DbRepair {
    public function getNature() {
        $sql = "
            SELECT 
                *
            FROM
                tb_nature
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>