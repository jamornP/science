<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Success extends DbSciDay {
    public function InsertSuccess($data) {
        $sql = "
            INSERT INTO tb_success (
                project_id, 
                user_id, 
                activity_id,
                date_add,
                checkdata
            ) VALUES (
                :project_id, 
                :user_id, 
                :activity_id,
                :date_add,
                'Yes'
            )    
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();

    }
    public function UpdateSuccess($data) {
        $sql = "
            UPDATE 
                tb_success 
            SET 
                date_add= :date_add
            WHERE 
                project_id= :project_id AND
                activity_id= :activity_id
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;

    }
    public function CheckSuccess($data) {
        $sql = "
            SELECT 
                * 
            FROM
                tb_success 
            WHERE 
                project_id= :project_id AND
                activity_id= :activity_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $rows = $stmt->rowCount ();
        if($rows>0){
            return true;
        }else{
            return false;
        }

    }

}
?>