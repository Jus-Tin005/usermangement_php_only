<?php
include_once 'lib/Database.php';

class Permissions{
    private $db;

    # Construct Auto Load
    public function __construct(){
        $this->db = new Database();
    }

    # Select Permission
    public function selectAllPermission(){
        $sql = "SELECT * FROM tbl_permissions ORDER BY per_id DESC";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}