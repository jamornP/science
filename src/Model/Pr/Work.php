<?php
namespace App\Model\Pr;
use App\Database\DbPr;

class Work extends DbPr {
    public function getAllWork() {
        $sql = "
           SELECT
               s.staff_id,
               s.name,
               s.surname,
               s.color,
               w.title,
               w.start_date,
               w.end_date,
               w.start_time,
               w.end_time,
               w.url
           FROM
               tb_work as w
               LEFT JOIN tb_staff AS s ON w.staff_id = s.staff_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getAllByUser($user) {
        $sql = "
           SELECT
               s.staff_id,
               s.name,
               s.surname,
               s.color,
               w.title,
               w.start_date,
               w.end_date,
               w.start_time,
               w.end_time,
               w.url
           FROM
               tb_work as w
               LEFT JOIN tb_staff AS s ON w.staff_id = s.staff_id
            WHERE
                w.staff_id = ? OR 
                w.staff_id = 99
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function addWork($work) {
        $sql ="
        INSERT INTO tb_work (
            id, 
            title, 
            start_date, 
            end_date, 
            start_time, 
            end_time, 
            url, 
            staff_id
        ) VALUES (
            NULL, 
            :title, 
            :start_date, 
            :end_date, 
            :start_time, 
            :end_time, 
            :url, 
            :staff_id        
        )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($work);
        return $this->pdo->lastInsertId();
    }
    public function getWorkById($id) {
        $sql = "
           SELECT
               s.staff_id,
               s.name,
               s.surname,
               s.color,
               w.title,
               w.start_date,
               w.end_date,
               w.start_time,
               w.end_time,
               w.url
           FROM
               tb_work as w
               LEFT JOIN tb_staff AS s ON w.staff_id = s.staff_id
            WHERE
                w.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function updateWork($id) {
        $sql = "
            UPDATE 
                tb_work 
            SET
                title = :title,
                start_date =:start_date,
                start_time =:start_time,
                end_date =:end_date,
                end_time =:end_time,
                staff_id = :staff_id,
                url = :url
           WHERE
                id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($id);
        return true;
    }
}