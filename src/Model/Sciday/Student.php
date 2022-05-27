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



}

?>