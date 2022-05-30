<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Round extends DbSciDay {
    public function InsertRound($data) {
        $sql = "
            INSERT INTO tb_round (
                id, 
                project_id, 
                activity_id, 
                level_id, 
                link_video, 
                num
            ) VALUES (
                NULL, 
                :project_id, 
                :activity_id, 
                :level_id, 
                :link_video, 
                :num
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();

    }
}