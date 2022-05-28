<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Project extends DbSciDay {
    public function InsertProject($project) {
        $sql = "
            INSERT INTO tb_project (
                id, 
                project_name, 
                level_id,
                school, 
                student_id, 
                teacher_id, 
                file_register, 
                images_id, 
                year
            )VALUES (
                NULL,
                :project_name, 
                :level_id,
                :school,
                :student_id,
                :teacher_id,
                :file_register,
                :images_id,
                '2022'
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($project);
        return $this->pdo->lastInsertId();

    }
    public function getAllProject() {
        $sql = "
            SELECT 
                p.id,
                p.project_name,
                l.name AS level,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id
            FROM
                tb_project AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            ORDER BY 
                date_at
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getProjectByLevel($level) {
        $sql = "
            SELECT 
                p.id,
                p.project_name,
                l.name AS level,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id
            FROM
                tb_project AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            WHERE
                p.level_id = ?
            ORDER BY 
                date_at
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$level]);
        $data = $stmt->fetchAll();
        return $data;
    }


}

?>