<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Level extends DbSciDay {
    public function getLevelByActivity($activity) {
        $sql = "
            SELECT * 
            FROM
                tb_level
            WHERE
                activity_id = ?
            ORDER BY
                id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$activity]);
        $data = $stmt->fetchAll();
        return $data;
    }
}

?>