<?php
namespace App\Model\Car;

use App\Database\DbCar;

class Choose extends DbCar {

    public function getAllChoose() {
        $sql = "
            SELECT *
            FROM tb_choose
            ORDER BY id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addChoose($choose) {
        $sql = "
            INSERT INTO tb_choose (
                id,
                name
            ) VALUES (
                NULL,
                :name
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($choose);
        return $this->pdo->lastInsertId();
    }

    public function deleteChoose($id) {
        $sql = "
            DELETE FROM tb_choose WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;

    }

    public function getChooseById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_choose 
            WHERE
                id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function updateChoose($choose) {
        $sql = "
            UPDATE tb_choose SET
                name = :name
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($choose);
        return true;
    }
}
?>