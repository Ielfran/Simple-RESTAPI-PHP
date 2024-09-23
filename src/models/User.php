<?php
class User{
    private $conn;
    private $table='users';

    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($db){
        $this->conn=$db;
    }

    public function create(){
        $query='INSERT INTO '.$this->table.'SET name=:name,email,=:email,password=:password';
        $stmt=$this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password,PASSWORD_BCRYPT));   

        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->blindParam(':password',$this->password);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
