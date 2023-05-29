<?php

//modèle des données de haut niveau
abstract class Model
{
    private $host = 'localhost';
    private $dbname = 'blog';
    private $username = 'root';
    private $password = 'orange';

    protected $_connection;
    public $table;
    public $id;

    public function getConnection()
    {
        try {
            $this->_connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            return $this->_connection;
        } catch (PDOException $exception) {
            echo "Error:" . $exception->getMessage();
            return null;
        }
    }

    public function getALL()
    {
        $sql = "SELECT * FROM " . $this->table;
        echo $sql;
        $querry = $this->_connection->prepare($sql);
        $querry->execute();
        return $querry->fetchAll();
    }

    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . "Where id=" . $this->id;
        $querry = $this->_connection->prepare($sql);
        $querry->execute();
        return $querry->fetch();
    }
}

//Test1: instancier cette classe et appeler getConnection()

$m = new Model();
$m->table = 'post';
$m->getConnection();
var_dump($m->getALL());


//Test2
?>