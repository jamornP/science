<?php
namespace App\Model\Repair;

use App\Database\DbRepair;

class Air extends DbRepair {
    public function getAirById($id) {
        $sql = "
            SELECT 
                *
            FROM
                tb_air
            WHERE
                r_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>