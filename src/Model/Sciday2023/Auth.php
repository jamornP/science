<?php
namespace App\Model\Sciday2023;
use App\Database\DbSciDay2023;

 class Auth extends DbSciDay2023 {
    public function checkUser($user) {
        $sql = "
        SELECT
            *
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
            $_SESSION['user_id'] = $userDB['u_id'];
            $_SESSION['name'] = $userDB['name'];
            $_SESSION['surname'] = $userDB['surname'];
            $_SESSION['email'] = $userDB['email'];
            $_SESSION['tel'] = $userDB['tel'];
            $_SESSION['role'] = $userDB['role'];
            $_SESSION['activity'] = $userDB['ac_id'];
            $_SESSION['login'] = true;
            $_SESSION['fullname'] = $userDB['name']." ".$userDB['surname'];
            $dataUser['login'] = true;
            $dataUser['role'] = $userDB['role'];

            return $dataUser;
        } else {
            $dataUser['login'] = false;
            return $dataUser;
        }
    }
    public function addUser($user) {
        $ckEmail = $this->checkEmail($user['email']);
        if($ckEmail){
            return false;
        }else{
            $user['password'] = password_hash($user['password'],PASSWORD_DEFAULT);

            $sql = "
            INSERT INTO tb_users (
                email,
                password, 
                name, 
                surname, 
                tel, 
                role, 
                ck
                
            ) VALUES (
                :email,
                :password, 
                :name, 
                :surname, 
                :tel, 
                'member', 
                :ck
            )
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($user);
            return true;
        }
    }
    public function checkEmail($email) {
        $sql = "
            SELECT *
            FROM tb_users
            WHERE email='{$email}'
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
    public function checkEmailTel($email,$tel) {
        $sql = "
            SELECT *
            FROM tb_users
            WHERE email='{$email}' AND tel ='{$tel}'
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
    public function ResetPassword($user) {
        $ckEmail = $this->checkEmailTel($user['email'],$user['tel']);
        if($ckEmail){
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
            // return false;
        }else{
           
            // return $ck;
        }
        return $ckEmail;
        
    }
}