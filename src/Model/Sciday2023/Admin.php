<?php
namespace App\Model\Sciday2023;
use App\Database\DbSciDay2023;

 class Admin extends DbSciDay2023 {
    // News
    public function getNewsAll($action){
        $sql = "
            SELECT * FROM tb_news ORDER BY n_date DESC
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
    public function addNews($data){
        $sql ="
            INSERT INTO tb_news (
                n_title,
                n_detail,
                n_link,
                n_show,
                d_id,
                n_date
            )VALUES(
                :n_title,
                :n_detail,
                :n_link,
                :n_show,
                :d_id,
                :n_date
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    // Download
    public function getDownloadById($action,$d_id){
        $sql = "
            SELECT *
            FROM tb_download 
            WHERE d_id = '{$d_id}'
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
    public function addDownload($data){
        $sql ="
            INSERT INTO tb_download (
                d_id,
                d_num,
                d_name,
                d_link,
                d_date
            )VALUES(
                :d_id,
                :d_num,
                :d_name,
                :d_link,
                :d_date
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    // Activity
    public function getActivityAll($action){
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
    public function getActivityByPages($page){
        $sql = "
            SELECT * FROM tb_activity WHERE pages='{$page}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getActivityById($id){
        $sql = "
            SELECT * FROM tb_activity WHERE ac_id='{$id}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function updateActivityBySql($data){
        $sql = "
            UPDATE tb_activity SET
                name = :name,
                year = :year,
                link = :link,
                com_link = :com_link,
                admin_link = :admin_link,
                pages = :pages,
                images = :images,
                schedule = :schedule
            WHERE
                ac_id = :ac_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    // level
    public function getLevelByActivity($a_id){
        $sql = "
            SELECT * FROM tb_level WHERE ac_id={$a_id} AND status=1
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    // title
    public function getTitleByGroup($group){
        $sql = "
            SELECT * FROM tb_title WHERE ti_group={$group}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    // project
    public function addProject($data){
        $sql="
            INSERT INTO tb_project (
                p_name,
                le_id,
                school,
                stu_id,
                tea_id,
                file_register,
                img_id,
                year,
                date_at,
                ac_id,
                tel,
                link_video,
                u_id
            )VALUES(
                :p_name,
                :le_id,
                :school,
                :stu_id,
                :tea_id,
                :file_register,
                :img_id,
                :year,
                :date_at,
                :ac_id,
                :tel,
                :link_video,
                :u_id
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getProjectByActivity($action,$ac_id){
        $sql = "
            SELECT pro.*,l.name as level
            FROM tb_project as pro
            LEFT JOIN tb_level as l ON l.le_id = pro.le_id
            WHERE pro.ac_id ={$ac_id}
            ORDER BY l.le_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getProjectByActivityUserId($action,$ac_id,$u_id){
        $sql = "
            SELECT pro.*,l.name as level
            FROM tb_project as pro
            LEFT JOIN tb_level as l ON l.le_id = pro.le_id
            WHERE pro.ac_id = {$ac_id} AND pro.u_id ={$u_id}
            ORDER BY l.le_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getProjectByProjectUserId($action,$pro_id,$u_id){
        $sql = "
            SELECT pro.*,l.name as level
            FROM tb_project as pro
            LEFT JOIN tb_level as l ON l.le_id = pro.le_id
            WHERE pro.u_id ={$u_id} AND pro.pro_id ={$pro_id}
            ORDER BY l.le_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data[0];
        }
    }
    public function updateProjectById($data){
        $sql ="
            UPDATE tb_project SET
                p_name = :p_name,
                le_id = :le_id,
                school = :school,
                file_register = :file_register,
                tel = :tel,
                link_video = :link_video,
                img_id = :img_id,
                date_update = :date_update
            WHERE
                pro_id = :pro_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function delProjectById($id){
        $sql ="
            DELETE FROM tb_project WHERE pro_id = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    // project Answer
    public function addProjectAnswer($data){
        $sql="
            INSERT INTO tb_project (
                le_id,
                school,
                stu_id,
                tea_id,
                file_register,
                year,
                date_at,
                ac_id,
                tel,
                u_id
            )VALUES(
                :le_id,
                :school,
                :stu_id,
                :tea_id,
                :file_register,
                :year,
                :date_at,
                :ac_id,
                :tel,
                :u_id
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function updateProjectAnswerById($data){
        $sql ="
            UPDATE tb_project SET
                le_id = :le_id,
                school = :school,
                file_register = :file_register,
                tel = :tel,
                date_update = :date_update
            WHERE
                pro_id = :pro_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;

    }
    // student
    public function addStuden($data){
        $sql = "
            INSERT INTO tb_student (
                stu_id,
                ti_id,
                stu_name,
                stu_surname,
                pro_id,
                school,
                ac_id
            )VALUES(
                :stu_id,
                :ti_id,
                :stu_name,
                :stu_surname,
                :pro_id,
                :school,
                :ac_id
            )    
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getStudentById($action,$stu_id){
        $sql = "
            SELECT stu.* , ti.name as title
            FROM tb_student as stu
            LEFT JOIN tb_title as ti ON ti.ti_id = stu.ti_id
            WHERE stu.stu_id = '{$stu_id}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function updateStudent($data){
        $sql="
            UPDATE tb_student SET
                ti_id = :ti_id,
                stu_name = :stu_name,
                stu_surname = :stu_surname,
                school = :school
            WHERE
                id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function delStudentById($id){
        $sql ="
            DELETE FROM tb_student WHERE pro_id = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    // teacher
    public function addTeacher($data){
        $sql = "
            INSERT INTO tb_teacher (
                tea_id,
                ti_id,
                tea_name,
                tea_surname,
                pro_id,
                school,
                ac_id
            )VALUES(
                :tea_id,
                :ti_id,
                :tea_name,
                :tea_surname,
                :pro_id,
                :school,
                :ac_id
            )    
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getTeacherById($action,$tea_id){
        $sql = "
            SELECT tea.* , ti.name as title
            FROM tb_teacher as tea
            LEFT JOIN tb_title as ti ON ti.ti_id = tea.ti_id
            WHERE tea.tea_id = '{$tea_id}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function updateTeacher($data){
        $sql="
            UPDATE tb_teacher SET
                ti_id = :ti_id,
                tea_name = :tea_name,
                tea_surname = :tea_surname,
                school = :school
            WHERE
                id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function delTeacherById($id){
        $sql ="
            DELETE FROM tb_teacher WHERE pro_id = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
    }
    // images
    public function addImages($data){
        $sql = "
            INSERT INTO tb_images (
                img_id,
                path,
                pro_id
            )VALUES(
                :img_id,
                :path,
                :pro_id
            )    
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getImageById($id){
        $sql ="
            SELECT * 
            FROM tb_images
            WHERE img_id ='{$id}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function delImagesById($id){
        $sql ="
            DELETE FROM tb_images WHERE pro_id = {$id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
       
    }
    // document
    public function getDocumentAll(){
        $sql = "
            SELECT doc.*, ac.name 
            FROM tb_document as doc
            LEFT JOIN tb_activity as ac ON ac.ac_id = doc.ac_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getDocumentById($id){
        $sql = "
            SELECT doc.*, ac.name as name
            FROM tb_document as doc
            LEFT JOIN tb_activity as ac ON ac.ac_id = doc.ac_id
            WHERE doc.ac_id = '{$id}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function updateDocument($data){
        $sql = "
            UPDATE tb_document SET
                doc_spec = :doc_spec,
                doc_regis_pdf = :doc_regis_pdf,
                doc_regis_word = :doc_regis_word
            WHERE ac_id = :ac_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    // shows
    public function getSettingAll(){
        $sql ="
            SELECT sh.*,ac.name as name 
            FROM tb_shows as sh
            LEFT JOIN tb_activity as ac ON ac.ac_id = sh.ac_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getSettingByActivity($ac_id){
        $sql ="
            SELECT sh.*,ac.name as name 
            FROM tb_shows as sh
            LEFT JOIN tb_activity as ac ON ac.ac_id = sh.ac_id
            WHERE sh.ac_id = {$ac_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public  function updateSetting($data){
        $sql ="
            UPDATE tb_shows SET
                register = :register,
                round2 = :round2,
                round3 = :round3,
                round4 = :round4,
                bt_register = :bt_register,
                bt_regis_show = :bt_regis_show,
                bt_edit = :bt_edit,
                bt_del = :bt_del
            WHERE ac_id = :ac_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
}
?>