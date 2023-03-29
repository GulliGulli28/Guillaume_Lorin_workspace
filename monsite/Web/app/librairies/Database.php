<?php

class Database
{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $db;
    private $query;

    public function __construct()
    {
        $this->db = null;
        try {
            $this->db = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->username,
                $this->password
            );
        } catch (PDOException $exception) {
            echo "Error:" . $exception->getMessage();
        }
    }


    public function query($sql)
    {
        $this->query = $this->db->prepare($sql);
    }

    public function execute()
    {
        return $this->query->execute();
    }

    public function single()
    {
        $this->execute();
        return $this->query->fetch();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->query->fetchAll();
    }

    public function rowCount()
    {
        $this->execute();
        return $this->query->rowCount();
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}


// Test Section 
// $db = new Database();
// $db->query("SELECT * FROM doctor");
// $dbr = $db->resultSet();
// var_dump($dbr);
// echo "<br>";
// var_dump($db->rowCount());
// echo "<br>";
// var_dump($db->single());
?>