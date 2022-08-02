<?php
namespace App\Model\Covid;

use App\Database\DbCovid;

class Data extends DbCovid {
    public function addData($data) {
        $sql="
            INSERT INTO tb_data (
               
                name, 
                surname, 
                tel, 
                stu_num,
                class_id, 
                magor_id, 
                date_covid, 
                remark, 
                images_id
            ) VALUES (   
                              
                :name, 
                :surname, 
                :tel, 
                :stu_num,
                :class_id, 
                :magor_id, 
                :date_covid, 
                :remark, 
                :images_id
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getDatarById($id) {
        $sql = "
            SELECT 
                d.name,
                d.surname,
                d.tel,
                d.date_covid,
                d.remark,
                d.images_id ,
                d.date_add,
                c.name as class,
                m.name as magor,
                de.name as department
            FROM 
                `tb_data` as d
                LEFT JOIN tb_class as c ON c.id = d.class_id
                LEFT JOIN tb_magor as m ON m.id = d.magor_id
                LEFT JOIN tb_department as de ON de.id = m.d_id
            WHERE 
                d.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
}
?>
