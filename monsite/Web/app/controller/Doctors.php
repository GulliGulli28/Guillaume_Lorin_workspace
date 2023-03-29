<?php

require_once(APPROOT."/librairies/Controller.php");

class Doctors extends Controller
{
    private $DoctorModel;

    public function __construct()
    {
        $this->DoctorModel = $this->loadModel("Doctor");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "email_error" => "",
                "password_error" => "",
            ];
            if (empty($data['email'])) {
                $data['email_error'] = "Please enter email";
            } elseif (!$this->DoctorModel->findDoctorsbyEmails($data['email'])) {
                $data['email_error'] = "No user found";
            }
            if (empty($data['password'])) {
                $data['password_error'] = "Please enter password";
            }
            if (empty($data['email_error']) && empty($data['password_error'])) {
                $loggedInDoctor = $this->DoctorModel->login($data['email'], $data['password']);
                if ($loggedInDoctor) {
                    $this->createDoctorSession($loggedInDoctor);
                    
                } else {
                    $data['password_error'] = "Password incorrect";
                    $this->render("login", $data);
                }
            } else {
                $this->render("login", $data);
            }
        } else {
            $data = [
                "email" => "",
                "password" => "",
                "email_error" => "",
                "password_error" => "",
            ];
            $this->render("login", $data);
        }
    }

    public function createDoctorSession($doctor){
        $_SESSION['doctor_id'] = $doctor['id'];
        $_SESSION['doctor_name'] = $doctor['name'];
        $_SESSION['doctor_email'] = $doctor['email'];
        redirect("patients");
    }
}

?>