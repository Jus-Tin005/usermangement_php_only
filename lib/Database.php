<?php
include("config/config.php");


class Database{
    public $pdo;

    public function __construct(){
        if(!isset($this->pdo)){
            try{
                $link = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME , DB_USER, DB_PASSWORD);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
            }catch(PDOException $e){
                die("Failed to connect..." . $e->getMessage());
            }
        }
    }
}