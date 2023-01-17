<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Department extends DbRepair {
    public function getDepartment() {
        $sql = "
            SELECT 
                *
            FROM
                tb_department
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}

?>