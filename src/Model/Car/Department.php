<?php
namespace App\Model\Car;

use App\Database\DbCar;

class Department extends DbCar {

    public function getAllDepartment() {
        $sql = "
            SELECT *
            FROM tb_department
            ORDER BY id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addDepartment($department) {
        $sql = "
            INSERT INTO tb_department (
                id,
                name
            ) VALUES (
                NULL,
                :name
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($department);
        return $this->pdo->lastInsertId();
    }

    public function deleteDepartment($id) {
        $sql = "
            DELETE FROM tb_department WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;

    }

    public function getDepartmentById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_department 
            WHERE
                id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function updateDepartment($department) {
        $sql = "
            UPDATE tb_department SET
                name = :name
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($department);
        return true;
    }
}
?>