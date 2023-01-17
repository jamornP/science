<?php
namespace App\Model\Repair;

use App\Database\DbRepair;

class Floor extends DbRepair {
    public function getFloorById($id) {
        $sql = "
            SELECT 
                *
            FROM
                tb_floor
            WHERE
                b_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>