<?php
include "../libraries/Database.php";
Class User {
    private $table="users";
    private $_connection;
    private $email;
    private $password;

    public function __construct()
    {
        $this->_connection = new Database();
    }

    public function findUserByEmail($email){
        $sql = "SELECT * FROM $this->table WHERE email= '$email'";
        $this->_connection->querry($sql);
        $count = $this->_connection->rowCount();
        return $count ==1;
    }
    public function login($email,$password){
        $sql = "SELECT * FROM $this->table WHERE email= '$email'";
        $this->_connection->querry($sql);
        $row= $this->_connection->single();
        if (password_verify($password, $row['password'])){
            return $row;
        }
        return false;
    }

    public function getUserByID($user_id){
        $sql = "SELECT * FROM $this->table WHERE id=$user_id";
        $this->_connection->querry($sql);
        $row = $this->_connection->single();
        if ($row>=1){
            return $row;
        }
        return false;
    }

    public function register($data){
        extract($data);
        $sql = "INSERT INTO $this->table (name, email, password) VALUES ('$name', '$email', '". password_hash($password, PASSWORD_DEFAULT)."')";
        $this->_connection->querry($sql);
        if ($this->_connection->execute()){
            return true;
        }
        return false;
    }
}

?>