<?php

class Database{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct(){
        $this->host=getenv('DB_HOST');
        $this->db_name=getenv('DB_NAME');
        $this->username=getenv('DB_USER');
        $this->password=getenv('DB_PASS');
    }

    public function getConnection(){
        $this->conn=null;
        try{
            $this->conn=new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
            $this->conn->exec('set name utf8');
        }catch(PDOException $exception){
            echo 'Connection error: '.$exception->getMessage();
        }
        return $this->conn;
    }
}

