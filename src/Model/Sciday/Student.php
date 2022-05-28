<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Student extends DbSciDay {
    public function InsertStudent($student) {
        $sql = "
            INSERT INTO tb_student (
                id,
                student_id,
                stitle, 
                sname, 
                ssurname, 
                project_id, 
                school
            ) VALUES (
                NULL, 
                :student_id, 
                :stitle, 
                :sname, 
                :ssurname, 
                :project_id, 
                :school
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($student);
        return $this->pdo->lastInsertId();

    }
    public function getStuByProject($project) {
        $sql = "
            SELECT 
                id,
                project_name,
                school,
                student_id,
                teacher_id,
                images_id
            FROM
                tb_project
            GROUP BY 
                project_name
            ORDER BY 
                id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }



}

?>