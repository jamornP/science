<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Building extends DbRepair {
    public function getBuilding() {
        $sql = "
            SELECT 
                *
            FROM
                tb_building
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>