<?php
class Adminorder_mdl
{
    protected $pdo;
    function __construct(){
        require $GLOBALS['database_path'];
        $this->pdo = $pdo;
    }
    function getall() {
        $sql = "SELECT * FROM orders ORDER BY voucherno DESC ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return $rows;
    }

}