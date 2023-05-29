<?php

require_once(APPROOT . "/librairies/Database.php");

class Doctor{

    private $db;
    private $table = "doctor";
    public $id;
    private $name;
    private $email;
    private $speciality;
    private $gender;
    private $created_at;
    public $doctor_r;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findDoctorsbyEmails($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email =   '$email'";
        $this->db->query($sql);
        return $this->db->rowCount() >= 1;
    }

    public function findDoctorsbyId($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id =   '$id'";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function create($data){
        extract($data);
        $sql = "INSERT INTO $this->table (name, email, password, specialist, gender) VALUES ('$name' , '$email', '". password_hash($password,PASSWORD_DEFAULT) . "', '$speciality', '$gender')";
        $this->db->query($sql);
        if ($this->db->execute()){
            $this->id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    public function login($email,$password){
        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $this->db->query($sql);
        $this->doctor_r = $this->db->single();
        if (password_verify($password,$this->doctor_r['password'])){
            return $this->doctor_r;
        }
        return false;
    }

}

// Test Section
$doctor = new Doctor();
//var_dump ($doctor->findDoctorsbyEmails("john.smith@example.com"));
//echo "<br>";
//var_dump($doctor->doctor_r);
//echo "<br>";
//var_dump($doctor->create(array(
//   "name" => "Dr. Mariaz Rodriguez",
//  "email" => "mariazerz.rodriguez@example.com",
//   "password" => "passwordzGHI",
//  "speciality" => "General",
//  "gender" => "F",)));
// echo $doctor->id;
//var_dump($doctor->login("mariazzzzz.rodriguez@example.com","passwordzGHI"));
?>
