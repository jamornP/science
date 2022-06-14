<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Showround extends DbSciDay {
    public function ShowByActivity($activity,$round) {
        $sql ="
            SELECT * 
            FROM
                tb_show
            WHERE
                activity_id = ? AND
                round = ".$round
        ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$activity]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getAllShow($activity,$round) {
        $sql ="
            SELECT * 
            FROM
                tb_show
            WHERE
                activity_id = ? AND
                round = ".$round
        ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$activity]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
}

?>