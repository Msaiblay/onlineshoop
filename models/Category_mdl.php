<?php


class Category_mdl
{
    protected $pdo;

    function __construct()
    {
        require $GLOBALS['database_path'];
        $this->pdo = $pdo;
    }
    function getall() {
        $sql = "SELECT * FROM category ORDER BY name ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }
    function  insert_data($data)
    {
        $sql = "INSERT INTO category (name,logo) VALUES (:v1,:v2)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1', $data['name']);
        $stmt->bindParam(':v2', $data['photo']);
        $stmt->execute();

        $rows = $stmt->rowCount();
        return $rows;
    }
    function edit_data($id){
        $sql="SELECT * FROM category Where id = :v1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$id);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }
    function update_data($id, $data){
        $sql="UPDATE category SET name=:v1, logo=:v2 Where id=:v3";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':v1',$data['name']);
        $stmt->bindParam(':v2',$data['photo']);
        $stmt->bindParam(':v3',$id);
        $stmt->execute();
        $rows = $stmt->rowcount();
        return $rows;
    }
    function randomcategories_data(){
        $sql = "SELECT * FROM category ORDER BY rand() LIMIT 8";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
?>