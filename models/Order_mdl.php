<?php


class Order_mdl{

    protected $pdo;
    function __construct()
    {
        require $GLOBALS['database_path'];
        $this->pdo = $pdo;
    }
    function  insert_data($data){

//        var_dump($data);
//        die();
//        $sql = "INSERT INTO users (name, email, password, phone, address, status) VALUES (:v1,:v2,:v3,:v4,:v5,:v6)";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':v1', $data['name']);
//        $stmt->bindParam(':v2', $data['email']);
//        $stmt->bindParam(':v3', $data['password']);
//        $stmt->bindParam(':v4', $data['phone']);
//        $stmt->bindParam(':v5', $data['address']);
//        $stmt->bindParam(':v6', $data['status']);
//        $stmt->execute();
//
////      last userid
//        $userid = $this->pdo->lastInsertId();
//        $roleid = 2;
//
//        $sql = "INSERT INTO model_has_role (user_id, role_id) VALUES (:v1,:v2)";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindParam(':v1', $userid);
//        $stmt->bindParam(':v2', $roleid);
//        $stmt->execute();
//
//        $rows = $stmt->rowCount();
//        return $rows;

        session_start();

        $cart = $data['cart'];
        $total = $data['total'];
        $note = $data['note'];

        $orderdate = date('Y-m-d');
        $voucherno = strtotime(date("h:i:s"));
        $status = 0;
        $userid = $_SESSION['login_user']['id'];
        $sql = "INSERT INTO orders (orderdate, voucherno, total, note, status, user_id) VALUES (:v1,:v2,:v3,:v4,:v5,:v6)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1', $orderdate);
        $stmt->bindParam(':v2', $voucherno);
        $stmt->bindParam(':v3', $total);
        $stmt->bindParam(':v4', $note);
        $stmt->bindParam(':v5', $status);
        $stmt->bindParam(':v6', $userid);
        $stmt->execute();

        $orderid = $this->pdo->lastInsertId();

        foreach ($cart as $cart){
            $itemid = $cart['id'];
            $qty = $cart['qty'];

            $sql= "INSERT INTO item_order(qry, item_id, order_id) VALUES (:v1, :v1, :v3)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':v1', $qty);
            $stmt->bindParam(':v2', $itemid);
            $stmt->bindParam(':v3', $orderid);
            $stmt->execute();

        }
        $rows = $stmt->rowCount();
        return $rows;

    }



}