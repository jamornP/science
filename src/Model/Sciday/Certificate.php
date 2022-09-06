<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Certificate extends DbSciDay {
    public function getAll($id) {
        switch ($id) {
            case 1:
                $sql="
                    select  
                        p.id,
                        t.name as stitle,
                        st.sname,
                        st.ssurname,
                        p.school,
                        'ได้เข้าร่วม' as lang,
                        'การประกวดสิ่งประดิษฐ์ทางวิทยาศาสตร์ ' as activity ,
                        l.name as level,
                        p.artifact_name,
                        p.teacher_id
                    from 
                        tb_artifact as p 
                        left join (select * from tb_round WHERE activity_id=2 AND (level_id = 1 OR level_id = 2 OR level_id = 3) AND num=2) as r on (r.project_id = p.id) 
                        left join tb_student as st on (p.student_id = st.student_id)
                        left join tb_title as t on (t.id = st.stitle)
                        left join tb_level as l on l.id = p.level_id
                    where 
                        r.project_id is null
                    order by 
                        l.name,
                        p.id,
                        p.school
                
                ";
                $stmt = $this->pdo->query($sql);
                $data = $stmt->fetchAll();
                return $data;
                break;
            case 2:
                $sql="
                    select  
                        p.id,
                        t.name as stitle,
                        st.sname,
                        st.ssurname,
                        p.school,
                        'ได้เข้าร่วม' as lang,
                        'การประกวดโครงงานวิทยาศาสตร์' as activity ,
                        l.name as level,
                        p.project_name,
                        p.teacher_id
                    from 
                        tb_project as p 
                        left join (select * from tb_round WHERE activity_id=2 AND (level_id = 4 OR level_id = 5 OR level_id = 6) AND num=2) as r on (r.project_id = p.id) 
                        left join tb_student as st on (p.student_id = st.student_id)
                        left join tb_title as t on (t.id = st.stitle)
                        left join tb_level as l on l.id = p.level_id
                    where 
                        r.project_id is null
                    order by 
                        l.name,
                        p.id,
                        p.school
                
                ";
                $stmt = $this->pdo->query($sql);
                $data = $stmt->fetchAll();
                return $data;
                break;
            case 3:
                $sql="
                    select  
                        p.id,
                        t.name as stitle,
                        st.sname,
                        st.ssurname,
                        p.school,
                        'เข้ารอบการประกวด' as lang,
                        'การประกวดโครงงาน IoT' as activity ,
                        p.iot_name,
                        p.teacher_id
                    from 
                        tb_iot as p 
                        left join (select * from tb_round WHERE activity_id=3 AND num=2) as r on (r.project_id = p.id) 
                        left join tb_student as st on (p.student_id = st.student_id)
                        left join tb_title as t on (t.id = st.stitle)
                        left join tb_level as l on l.id = p.level_id
                    where 
                        r.project_id is not null
                    order by 
                        l.name,
                        p.id,
                        p.school
                
                ";
                $stmt = $this->pdo->query($sql);
                $data = $stmt->fetchAll();
                return $data;
                break;                
            case 4:
                $sql="
                    select  
                        p.project_id as id,
                        t.name as stitle,
                        st.sname,
                        st.ssurname,
                        a.school,
                        'ได้เข้าร่วม' as lang,
                        'การแข่งขันตอบปัญหาความรู้ทั่วไปทางวิทยาศาสตร์ ' as activity ,
                        l.name as level
                    from 
                        (SELECT * FROM `tb_round` WHERE activity_id = 4 AND (level_id = 7 OR level_id = 8) AND num =2) as p
                        left join tb_answer as a on a.id = p.project_id
                        left join (select * from tb_round WHERE activity_id=4 AND num=3) as r on (r.project_id = p.project_id) 
                        left join tb_student as st on (a.student_id = st.student_id)
                        left join tb_title as t on (t.id = st.stitle)
                        left join tb_level as l on l.id = p.level_id
                    where 
                        r.project_id is null
                    order by 
                        l.name,
                        p.project_id,
                        a.school
                
                ";
                $stmt = $this->pdo->query($sql);
                $data = $stmt->fetchAll();
                return $data;
                break;
            case 6:
                $sql="
                    select  
                        p.id,
                        t.name as stitle,
                        st.sname,
                        st.ssurname,
                        p.school,
                        'ได้เข้าร่วม' as lang,
                        'การแข่งขัน micro:bit' as activity ,
                        p.micro_name,
                        p.teacher_id
                    from 
                        tb_micro as p 
                        left join (select * from tb_round WHERE activity_id=3 AND num=2) as r on (r.project_id = p.id) 
                        left join tb_student as st on (p.student_id = st.student_id)
                        left join tb_title as t on (t.id = st.stitle)
                        left join tb_level as l on l.id = p.level_id
                    where 
                        r.project_id is null
                    order by 
                        l.name,
                        p.id,
                        p.school
                
                ";
                $stmt = $this->pdo->query($sql);
                $data = $stmt->fetchAll();
                return $data;
                break;             
          }
       
    }

}
?>