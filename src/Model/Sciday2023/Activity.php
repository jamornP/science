<?php
namespace App\Model\Sciday2023;
use App\Database\DbSciDay2023;

 class Activity extends DbSciDay2023 {
    // 
    public function getAll($action){
        $sql = "
            SELECT * FROM tb_activity
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            $count = count($data);
            return $count;
        }else{
            return $data;
        }
    }
    // Download
    // public function getDownloadById($action,$d_id){
    //     $sql = "
    //         SELECT *
    //         FROM tb_download 
    //         WHERE d_id = {$d_id}
    //     ";
    //     $stmt = $this->pdo->query($sql);
    //     $data = $stmt->fetchAll();
    //     if($action=="count"){
    //         $count = count($data);
    //         return $count;
    //     }else{
    //         return $data;
    //     }
    // }
}
?>