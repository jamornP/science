<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Teacher extends DbSciDay {
    public function InsertTeacher($teacher) {
        $sql = "
            INSERT INTO tb_teacher (
                id, 
                teacher_id, 
                ttitle, 
                tname, 
                tsurname, 
                project_id, 
                school
            ) VALUES (
                NULL, 
                :teacher_id, 
                :ttitle, 
                :tname, 
                :tsurname, 
                :project_id, 
                :school
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($teacher);
        return $this->pdo->lastInsertId();

    }



}

?>