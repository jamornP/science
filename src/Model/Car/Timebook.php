<?php 
namespace App\Model\Car;

use App\Database\DbCar;

class Timebook extends DbCar {
    public function getAllTime() {
        $sql = "
            SELECT *
            FROM tb_timebook
            ORDER BY time
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}