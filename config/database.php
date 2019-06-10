<?php

class Database{
    private $host = "localhost";
    private $db_name = "trubl_bdd";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function open(){
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

    public function close(){
        $this->conn = null;
  }

}

$pdo = new Database();
?>