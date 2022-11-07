<?php
namespace App\Model\Pr;
use App\Database\DbPr;

class User extends DbPr {
    public function createUser($user) {
        $user['password'] = password_hash($user['password'],PASSWORD_DEFAULT);

        $sql = "
            INSERT INTO tb_staff (
                name,
                surname,
                email,
                password,
                color
            ) VALUES (
                :name,
                :surname,
                :email,
                :password,
                :color
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);

        // session_start();
        // $id = $this->pdo->lastInsertId();
        // $SESSION['id'] = $id;
        // $_SESSION['name'] = $user['name'];
        // $_SESSION['surname'] = $user['surname'];
        // $_SESSION['email'] = $user['email'];
        // $_SESSION['p_id'] = $user['p_id'];
        // $_SESSION['d_id'] = $user['d_id'];
        // $_SESSION['role'] = 'member';
        // $_SESSION['login'] = true;

        return true;
    }
    public function checkUser($user) {
        $sql = "
           SELECT
               staff_id,
               name,
               surname,
               email,
               password
           FROM
               tb_staff
           WHERE
               email = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user['email']]);
        $data = $stmt->fetchAll();
        $userDB = $data[0];
        if(password_verify($user['password'],$userDB['password'])) {
           session_start();
           $_SESSION['id'] = $userDB['staff_id'];
           $_SESSION['name'] = $userDB['name'];
           $_SESSION['surname'] = $userDB['surname'];
           $_SESSION['email'] = $userDB['email'];
           $_SESSION['login'] = true;

           return true;
        } else {
           return false;
        }
    }
    public function getAllUser() {
        $sql = "
           SELECT
               staff_id,
               name,
               surname,
               color
           FROM
               tb_staff
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getUserById($id) {
        $sql = "
           SELECT
               staff_id,
               name,
               surname,
               color
           FROM
               tb_staff
            WHERE
                staff_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function updateUser($user) {
        $sql = "
            UPDATE 
                tb_staff 
            SET
                name = :name,
                surname =:surname,
                color = :color
           WHERE
                staff_id = :staff_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);
        return true;
    }
}
?>