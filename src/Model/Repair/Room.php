<?php
namespace App\Model\Repair;

use App\Database\DbRepair;

class Room extends DbRepair {
    public function getRoomById($id) {
        $sql = "
            SELECT 
                *
            FROM
                tb_room
            WHERE
                f_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>