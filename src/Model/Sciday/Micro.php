<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Micro extends DbSciDay {
    public function InsertMicro($micro) {
        $sql = "
            INSERT INTO tb_micro(
                id, 
                micro_name, 
                level_id, 
                school, 
                student_id, 
                teacher_id, 
                file_register, 
                images_id,
                user_id,
                year
            ) VALUES (
                NULL,
                :micro_name, 
                :level_id, 
                :school, 
                :student_id, 
                :teacher_id, 
                :file_register, 
                :images_id,
                :user_id,
                '2022'
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($micro);
        return $this->pdo->lastInsertId();

    }
    public function getMicroByUser($user) {
        $sql = "
            SELECT 
                p.id,
                p.micro_name,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.user_id
            FROM
                tb_micro AS p
            WHERE
                p.user_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getMicroById($id) {
        $sql = "
            SELECT 
                p.id,
                p.micro_name,
                l.name AS level,
                p.level_id,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id,
                p.level_id
            FROM
                tb_micro AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            WHERE
                p.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
}