<?php

class Database{
    private $host = 'localhost';
    private $dbname = 'Blog';
    private $username = 'root';
    private $password = 'orange';
    private $querry;

    protected $_connection;
    public $table;

    public function __construct()
    {
        $this->_connection = null;
        try {
            $this->_connection = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->username,
                $this->password
            );
        } catch (PDOException $exception) {
            echo "Error:" . $exception->getMessage();
        }
    }
    
    public function querry($sql){
        $this->querry = $this->_connection->prepare($sql);
        
    }

    public function execute(){
        return $this->querry->execute();
    }

    public function single(){
        $this->execute();
        return $this->querry->fetch();
    }

    public function resultSet(){
        $this->execute();
        return $this->querry->fetchAll();
    }

    public function rowCount(){
        $this->execute();
        return $this->querry->rowCount();
    }

    public function lastInsertedID(){
        return $this->_connection->lastInsertId();
    }
}
$m = new Database();
$sql= "SELECT * FROM users";
$m->querry($sql);
var_dump($m->lastInsertedID());

?>