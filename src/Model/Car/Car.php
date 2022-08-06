<?php
namespace App\Model\Car;

use App\Database\DbCar;

class Car extends DbCar {

    public function getAllCarByAdmin() {
        $sql = "
            SELECT *
            FROM tb_car
            ORDER BY name
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getAllCar() {
        $sql = "
            SELECT *
            FROM tb_car
            WHERE status = 'y'
            ORDER BY name
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addCar($car) {
        $sql = "
            INSERT INTO tb_car (
                id,
                name
            ) VALUES (
                NULL,
                :name
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($car);
        return $this->pdo->lastInsertId();
    }

    public function deleteCar($id) {
        $sql = "
            DELETE FROM tb_car WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;

    }

    public function getCarById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_car 
            WHERE
                id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function updateCar($car) {
        $sql = "
            UPDATE tb_car SET
                name = :name
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($car);
        return true;
    }
}
?>