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
    public function getStuById($id) {
        $sql = "
        SELECT 
            t.name AS stitle,
            s.sname,
            s.ssurname,
            s.id 
        FROM 
            tb_student AS s 
            LEFT JOIN tb_title AS t ON s.stitle = t.id
        WHERE 
            s.student_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }


}

?>