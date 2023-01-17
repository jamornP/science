<?php
namespace App\Model\Tcas66;
use App\Database\DbTcas66;

 class Certificate extends DbTcas66 {

     

    public function getCerByProject ($project) {
        $sql = "
           SELECT
               *
           FROM
               tb_certificate 
            WHERE
               project = ?
            
       ";
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute([$project]);
       $data = $stmt->fetchAll();
       return $data;
    }

    public function updateCer($data) {
        $sql = "
            UPDATE tb_certificate SET
                file_cer = :file_cer
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function getPersonByName($name) {
        $sql = "
            SELECT 
                * 
            FROM
                tb_certificate
            WHERE 
                name LIKE '%".$name."%'
        ";
        $stmt = $this->pdo->query($sql);
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        return $data;
    }
    
 }


?>