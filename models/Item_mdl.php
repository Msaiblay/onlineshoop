<?php
class Item_mdl
{
    protected $pdo;
    function __construct()
    {
        require $GLOBALS['database_path'];
        $this->pdo = $pdo;
    }
    function getall() {
        $sql = "SELECT items.* , brand.id as bid ,brand.name as bname
                FROM items
                LEFT JOIN brand
                ON items.brand_id = brand.id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }
    function  insert_data($data)
    {
        $sql = "INSERT INTO items (codeno, name, photo, price, discount, discription, brand_id, sub_category) VALUES (:v1 ,:v2, :v3, :v4, :v5, :v6, :v7, :v8)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':v1', '123');
        $stmt->bindValue(':v2', $data['name']);
        $stmt->bindValue(':v3', $data['photo']);
        $stmt->bindValue(':v4', $data['uprice']);
        $stmt->bindValue(':v5', $data['dprice']);
        $stmt->bindValue(':v6', $data['disre']);
        $stmt->bindValue(':v7', $data['brandid']);
        $stmt->bindValue(':v8', $data['subcategoryid']);
        $stmt->execute();
        $rows = $stmt->rowCount();
        return $rows;
    }
    function edit_data($id){
        $sql="SELECT * FROM items WHERE id = :v1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$id);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }
    function update_data($id, $data){
//        $sql = "INSERT INTO items (codeno, name, photo, price, discount, discription, brand_id, sub_category) VALUES (:v1 ,:v2, :v3, :v4, :v5, :v6, :v7, :v8)";
        $sql = "UPDATE items SET name=:v1, photo=:v2, price:=:v3, discount=:v4, discription=:v5, brand_id=:v6, sub_category=:v7 WHERE id = :v8";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':v1', $data['name']);
        $stmt->bindValue(':v2', $data['photo']);
        $stmt->bindValue(':v3', $data['uprice']);
        $stmt->bindValue(':v4', $data['dprice']);
        $stmt->bindValue(':v5', $data['disre']);
        $stmt->bindValue(':v6', $data['brandid']);
        $stmt->bindValue(':v7', $data['subcategoryid']);
        $stmt->bindValue(':v8', $id);
        $stmt->execute();
        $rows = $stmt->rowCount();
        return $rows;
    }

    function deletedata($id){
        $sql="DELETE FROM items WHERE id = :v1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$id);
        $stmt->execute();
        $rows = $stmt->rowcount();
        return $rows;
    }
    function discountitemdata(){
        $sql = "SELECT * FROM items WHERE  discount != '' LIMIT 8";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    function newitemdata(){
        $sql = "SELECT * FROM items ORDER BY created_at DESC LIMIT 8";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    function randomitemdata(){
        $subcid =11;
        $sql = "SELECT * FROM items WHERE sub_category = :v1 LIMIT 8";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$subcid);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}