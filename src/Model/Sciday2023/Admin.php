<?php
namespace App\Model\Sciday2023;
use App\Database\DbSciDay2023;

 class Admin extends DbSciDay2023 {
    // confirm
    public function addConfirm($data){
        $sql ="
            INSERT INTO tb_confirm (
               pro_id,
               date_confirm
            )VALUES(
               :pro_id,
               :date_confirm
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getConfirmByProject($action,$pro_id){
        $sql ="
            SELECT * 
            FROM tb_confirm
            WHERE pro_id={$pro_id}
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
    public function delConfirm($pro_id){
        $sql = "
        DELETE FROM tb_confirm
        WHERE pro_id={$pro_id}
    ";
    $stmt = $this->pdo->query($sql);
    if($stmt){
        return true;
    }else{
        return false;
    }
    }
    // SQL SELECT count(school) FROM `tb_project` GROUP BY school ORDER BY school
    public function getSql($action,$sql){
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            $count = count($data);
            return $count;
        }else{
            return $data;
        }
    }
    public function getSchoolByActivity($action,$data){
        $sql ="
            SELECT * 
            FROM tb_project 
            WHERE school = :school AND ac_id =:ac_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetchAll();
        if($action=="count"){
            $count = count($data);
            return $count;
        }else{
            return $data;
        }
    }

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
    public function getNewsById($n_id){
        $sql = "
            SELECT * FROM tb_news WHERE n_id={$n_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
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
    public function delNews($n_id){
        $sql = "
            DELETE FROM tb_news
            WHERE n_id={$n_id}
        ";
        $stmt = $this->pdo->query($sql);
        if($stmt){
            return true;
        }else{
            return false;
        }
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
    public function getLevelById($id){
        $sql = "
            SELECT * FROM tb_level WHERE le_id={$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getLevelByActivity($a_id){
        $sql = "
            SELECT * FROM tb_level WHERE ac_id={$a_id} AND status=1
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getLevelByActivityAll($a_id){
        $sql = "
            SELECT * FROM tb_level WHERE ac_id={$a_id}
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
    public function getProjectByActivityLevel($action,$ac_id,$le_id){
        $sql = "
            SELECT pro.*,l.name as level
            FROM tb_project as pro
            LEFT JOIN tb_level as l ON l.le_id = pro.le_id
            WHERE pro.ac_id ={$ac_id} AND pro.le_id ={$le_id}
            ORDER BY pro.date_at
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
    public function getProjectById($pro_id){
        $sql = "
            SELECT p.*,l.name as level
            FROM tb_project as p
            LEFT JOIN tb_level as l ON l.le_id = p.le_id
            WHERE p.pro_id ={$pro_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
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
    public function updateProjectById2($data){
        $sql ="
            UPDATE tb_project SET
                p_name = :p_name,
                school = :school,
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
    public function updateProjectAnswerById2($data){
        $sql ="
            UPDATE tb_project SET
                school = :school,
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
                ac_id,
                stu_email
            )VALUES(
                :stu_id,
                :ti_id,
                :stu_name,
                :stu_surname,
                :pro_id,
                :school,
                :ac_id,
                :stu_email
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
    public function getStudentByActivity($action,$ac_id){
        $sql = "
            SELECT stu.* , ti.name as title
            FROM tb_student as stu
            LEFT JOIN tb_title as ti ON ti.ti_id = stu.ti_id
            WHERE stu.ac_id = '{$ac_id}'
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
                stu_email = :stu_email,
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
                ac_id,
                tea_email
            )VALUES(
                :tea_id,
                :ti_id,
                :tea_name,
                :tea_surname,
                :pro_id,
                :school,
                :ac_id,
                :tea_email
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
    public function getTeacherByActivity($action,$ac_id){
        $sql = "
            SELECT tea.* , ti.name as title
            FROM tb_teacher as tea
            LEFT JOIN tb_title as ti ON ti.ti_id = tea.ti_id
            WHERE tea.ac_id = '{$ac_id}'
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
                tea_email = :tea_email,
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
                bt_del = :bt_del,
                bt_con = :bt_con,
                bt_editcer = :bt_editcer
            WHERE ac_id = :ac_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    // หน้าหลัก
    public function getIndex(){
        $sql ="
            SELECT * 
            FROM tb_index
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getIndexฺById($id){
        $sql ="
            SELECT * 
            FROM tb_index
            WHERE id={$id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function updateIndex($data){
        $sql = "
            UPDATE tb_index SET
                img_head = :img_head,
                youtube = :youtube,
                img_poster = :img_poster
            WHERE
                id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    // user เบอร์โทร
    public function getUserById($u_id){
        $sql ="
            SELECT * 
            FROM tb_users
            WHERE u_id={$u_id}
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    //  Grop
    public function getGroupByRound($action,$round,$ac_id,$le_id){
        $sql ="
            SELECT g.round,p.*,l.name as level 
            FROM tb_group as g
            LEFT JOIN tb_project as p ON p.pro_id = g.pro_id
            LEFT JOIN tb_level as l ON l.le_id = p.le_id
            WHERE (g.round = '{$round}') AND (g.ac_id = {$ac_id}) AND (g.le_id = {$le_id})
            ORDER BY g.score DESC , p.date_at
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getGroupByRoundShow($action,$round,$ac_id,$le_id){
        $sql ="
            SELECT g.round,p.*,l.name as level 
            FROM tb_group as g
            LEFT JOIN tb_project as p ON p.pro_id = g.pro_id
            LEFT JOIN tb_level as l ON l.le_id = p.le_id
            WHERE (g.round = '{$round}') AND (g.ac_id = {$ac_id}) AND (g.le_id = {$le_id})
            ORDER BY p.pro_id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data;
        }
    }
    public function getGroupByProRound($action,$pro_id,$round){
        $sql ="
            SELECT * 
            FROM tb_group
            WHERE pro_id={$pro_id} AND round='{$round}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action=="count"){
            return count($data);
        }else{
            return $data[0];
        }
    }
    public function addGroup($data){
        $sql = "
            INSERT INTO tb_group ( 
                pro_id,
                ac_id,
                le_id,
                round,
                score,
                year
            )VALUES(
                :pro_id,
                :ac_id,
                :le_id,
                :round,
                :score,
                :year
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function ckProjectInGropu($pro_id,$ac_id,$le_id,$round){
        $sql="
            SELECT * 
            FROM tb_group
            WHERE pro_id={$pro_id} AND ac_id={$ac_id} AND le_id={$le_id} AND round='{$round}'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $count = count($data);
        if($count>0){
            return true;
        }else{
            return false;
        }
    }
    public function delGroup($pro_id,$ac_id,$le_id,$round){
        $sql = "
            DELETE FROM tb_group 
            WHERE pro_id={$pro_id} AND ac_id={$ac_id} AND le_id={$le_id} AND round='{$round}'
        ";
        $this->pdo->query($sql);
        return true;
    }
    public function updateGroup($data){
        $sql = "
            UPDATE tb_group 
            SET score=:score
            WHERE pro_id=:pro_id AND ac_id=:ac_id AND le_id=:le_id AND round=:round
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    // carousel
    public function getCarouselAll(){
        $sql ="
            SELECT * FROM tb_carousel ORDER BY c_id 
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getCarouselShow(){
        $sql ="
            SELECT * FROM tb_carousel WHERE c_show=1 ORDER BY c_id 
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function addcarousel($data){
        $sql = "
            INSERT INTO tb_carousel ( 
                img_path,
                num,
                c_show,
                active,
                c_link
            )VALUES(
                :img_path,
                :num,
                :c_show,
                :active,
                :c_link
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function delCarousel($c_id){
        $sql = "
            DELETE FROM tb_carousel 
            WHERE c_id={$c_id}
        ";
        $this->pdo->query($sql);
        return true;
    }
}
