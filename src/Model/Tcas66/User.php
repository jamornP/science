<?php
namespace App\Model\Tcas66;
use App\Database\DbTcas66;

 class User extends DbCar {
     public function createUser($user) {
         $user['password'] = password_hash($user['password'],PASSWORD_DEFAULT);

         $sql = "
            INSERT INTO tb_users (
                name,
                surname,
                email,
                password,
                p_id,
                d_id,
                tel
            ) VALUES (
                :name,
                :surname,
                :email,
                :password,
                :position,
                :department,
                :tel
            )
         ";
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute($user);

         session_start();
         $id = $this->pdo->lastInsertId();
         $SESSION['id'] = $id;
         $_SESSION['name'] = $user['name'];
         $_SESSION['surname'] = $user['surname'];
         $_SESSION['email'] = $user['email'];
         $_SESSION['p_id'] = $user['p_id'];
         $_SESSION['d_id'] = $user['d_id'];
         $_SESSION['role'] = 'member';
         $_SESSION['login'] = true;

         return true;
     }

     public function checkUser($user) {
         $sql = "
            SELECT
                id,
                name,
                surname,
                email,
                p_id,
                d_id,
                role,
                password
            FROM
                tb_users
            WHERE
                email = ?
         ";
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute([$user['email']]);
         $data = $stmt->fetchAll();
         $userDB = $data[0];
         if(password_verify($user['password'],$userDB['password'])) {
            session_start();
            $_SESSION['id'] = $userDB['id'];
            $_SESSION['name'] = $userDB['name'];
            $_SESSION['surname'] = $userDB['surname'];
            $_SESSION['email'] = $userDB['email'];
            $_SESSION['p_id'] = $userDB['p_id'];
            $_SESSION['d_id'] = $userDB['d_id'];
            $_SESSION['role'] = $userDB['role'];
            $_SESSION['login'] = true;

            return true;
         } else {
            return false;
         }
     }
     public function getAllUser() {
        $sql = "
           SELECT
               u.id,
               u.name,
               u.surname,
               u.email,
               p.name AS position,
               d.name AS department,
               u.role,
               u.created_at,
               u.updated_at
           FROM
               tb_users AS u
               LEFT JOIN tb_position AS p ON u.p_id = p.id
               LEFT JOIN tb_department AS d ON u.d_id = d.id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function getUserById ($id) {
        $sql = "
           SELECT
               u.id,
               u.name,
               u.surname,
               u.email,
               u.p_id,
               u.d_id,
               u.role,
               u.tel,
               u.created_at,
               u.updated_at,
               p.name AS position,
               d.name AS department
           FROM
               tb_users AS u
               LEFT JOIN tb_position AS p ON u.p_id = p.id
               LEFT JOIN tb_department AS d ON u.d_id = d.id
            WHERE
               u.id = ?
       ";
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute([$id]);
       $data = $stmt->fetchAll();
       return $data[0];
    }

    public function updateUser($user,$date) {
        $sql = "
            UPDATE tb_users SET
                name = :name,
                surname = :surname,
                tel = :tel,
                p_id = :position,
                d_id = :department,
                updated_at = '".$date."'
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);
        return true;
    }
    public function updateUserAdmin($user,$date) {
        $sql = "
            UPDATE tb_users SET
                name = :name,
                surname = :surname,
                tel = :tel,
                p_id = :position,
                d_id = :department,
                role = :role,
                updated_at = '".$date."'
            WHERE id = :id
         ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);
        return true;
    }

    public function deleteUser($id) {
        $sql = "
            DELETE FROM tb_users WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }
    public function checkEmail($email) {
        $sql = "
            SELECT *
            FROM tb_users
            WHERE email=:email AND tel=:tel
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($email);
        $data = $stmt->fetchColumn();
        if($data>0){
            return true;
        }else{
            return false;
        }
    }
    public function ResetPassword($user) {
        $user['password'] = password_hash($user['password'],PASSWORD_DEFAULT);

        $sql = "
            UPDATE 
                tb_users 
            SET
                password=:password 
            WHERE
                email = :email AND
                tel = :tel
        ";
        $stmt = $this->pdo->prepare($sql);
        $ck = $stmt->execute($user);
        return true;
        
        
    }
 }


?>