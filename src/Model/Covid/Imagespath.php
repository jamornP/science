<?php
namespace App\Model\Covid;

use App\Database\DbCovid;

class Imagespath extends DbCovid {
    public function InsertImagespath($imagespath) {
        $sql = "
            INSERT INTO tb_images (
                id, 
                images_id, 
                images_path
            ) VALUES (
                NULL, 
                :images_id, 
                :images_path
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($imagespath);
        return $this->pdo->lastInsertId();
    }
    public function getImagesById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_images 
            WHERE 
                images_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }


}

?>