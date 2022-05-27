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



}

?>