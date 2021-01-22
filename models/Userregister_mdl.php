<?php


class Userregister_mdl{

    protected $pdo;
    function __construct()
    {
        require $GLOBALS['database_path'];
        $this->pdo = $pdo;
    }
    function  insert_data($data){

//        var_dump($data);
//        die();
        $sql = "INSERT INTO users (name, email, password, phone, address, status) VALUES (:v1,:v2,:v3,:v4,:v5,:v6)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1', $data['name']);
        $stmt->bindParam(':v2', $data['email']);
        $stmt->bindParam(':v3', $data['password']);
        $stmt->bindParam(':v4', $data['phone']);
        $stmt->bindParam(':v5', $data['address']);
        $stmt->bindParam(':v6', $data['status']);
        $stmt->execute();

//      last userid
        $userid = $this->pdo->lastInsertId();
        $roleid = 2;

        $sql = "INSERT INTO model_has_role (user_id, role_id) VALUES (:v1,:v2)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1', $userid);
        $stmt->bindParam(':v2', $roleid);
        $stmt->execute();

        $rows = $stmt->rowCount();
        return $rows;
    }
    function login_data($data){

        $sql = "SELECT * FROM users WHERE email=:v1 AND password=:v2";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1', $data['email']);
        $stmt->bindParam(':v2', $data['password']);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
//        var_dump($user);
//        die();
        return $user;


    }
}