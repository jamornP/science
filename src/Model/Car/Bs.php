<?php
namespace App\Model\Car;

use App\Database\DbCar;

class Bs extends DbCar {

    public function getAllBs() {
        $sql = "
            SELECT *
            FROM tb_bs
            ORDER BY b_id, id 
            DESC
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addBs($bs) {
        $sql = "
            INSERT INTO tb_bs (
                id,
                b_id,
                number,
                sname,
                tel,
                s_id,
                user_add
            ) VALUES (
                NULL,
                :b_id,
                :number,
                :sname,
                :tel,
                :s_id,
                :user_add
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bs);
        return $this->pdo->lastInsertId();

    }

    public function deleteBsByBook($id) {
        $sql = "
            DELETE FROM tb_bs WHERE b_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;

    }

    public function getBsById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_bs 
            WHERE
                b_id = ?
            ORDER BY
                id
            DESC
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }

    // public function updatePosition($position) {
    //     $sql = "
    //         UPDATE tb_position SET
    //             name = :name
    //         WHERE id = :id
    //      ";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute($position);
    //     return true;
    // }
}
?>