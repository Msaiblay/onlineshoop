<?php


class Subcategory_mdl
{
    protected $pdo;

    function __construct()
    {
        require $GLOBALS['database_path'];
        $this->pdo = $pdo;
    }
    function getall() {
        $sql = "SELECT sub_category.* , category.id as cid ,category.name as cname
                FROM sub_category
                LEFT JOIN category
                ON sub_category.category_id = category.id ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }
    function  insert_data($data)
    {
        $sql = "INSERT INTO sub_category (name,category_id) VALUES (:v1,:v2)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1', $data['name']);
        $stmt->bindParam(':v2', $data['categoryid']);
        $stmt->execute();

        $rows = $stmt->rowCount();
        return $rows;
    }
    function edit_data($id){
//        var_dump($id);
//        die();
        $sql="SELECT * FROM sub_category Where id = :v1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$id);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    function update_data($id, $data){
        $sql="UPDATE sub_category SET name=:v1,category_id=:v2 Where id=:v3";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$data['name']);
        $stmt->bindParam(':v2',$data['categoryid']);
        $stmt->bindParam(':v3',$id);
        $stmt->execute();
        $rows = $stmt->rowcount();
        return $rows;
    }
    function geallbyid($id){
        $sql = "SELECT * FROM sub_category WHERE category_id = :v1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$id);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    function delete($id){
        $sql = "DELETE FROM sub_category WHERE id = :v1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$id);
        $stmt->execute();
        $rows = $stmt->rowcount();
        return $rows;
    }
}
?>