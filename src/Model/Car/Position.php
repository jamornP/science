<?php
namespace App\Model\Car;

use App\Database\DbCar;

class Position extends DbCar {

    public function getAllPosition() {
        $sql = "
            SELECT *
            FROM tb_position
            ORDER BY id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addPosition($position) {
        $sql = "
            INSERT INTO tb_position (
                id,
                name
            ) VALUES (
                NULL,
                :name
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($position);
        return $this->pdo->lastInsertId();
    }

    public function deletePosition($id) {
        $sql = "
            DELETE FROM tb_position WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;

    }

    public function getPositionById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_position 
            WHERE
                id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function updatePosition($position) {
        $sql = "
            UPDATE tb_position SET
                name = :name
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($position);
        return true;
    }
}
?>