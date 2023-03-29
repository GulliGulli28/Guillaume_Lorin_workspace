<?php

Class Patient{

    private $db;
    private $table = "patient";
    public $id;
    public $doctor_id;
    private $name;
    private $email;
    private $phone;
    private $health_condition;
    private $update_at;
    private $created_at;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPatient($data)
    {
        extract($data);
        $sql = "INSERT INTO $this->table (doctor_id,name ,email, phone, health_condition) VALUES ('$doctor_id' , '$name' , '$email', '$phone' , '$health_condition')";
        $this->db->query($sql);
        if ($this->db->execute()){
            $this->id = $this->db->lastInsertId();
            return true;
        }
        return false;

    }

    public function showPatient($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = '$id'";
        $this->db->query($sql);
        return $this->db->single();
    }

    public function deletePatient($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        $this->db->query($sql);
        return $this->db->execute();
    }

    public function updatePatient($data)
    {
        extract($data);
        for ($i = 0; $i < count($data); $i++){
            $sql = "UPDATE $this->table SET $data[$i] = '$data[$i]' WHERE id = '$id'";
            $this->db->query($sql);
            $this->db->execute();
        }
        return true;
    }

    public function getPatients()
    {
        $sql = "SELECT * FROM $this->table Join doctor ON doctor.id = patient.doctor_id";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}