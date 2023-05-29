<?php
    Class Users extends Controller {
        private $userModel;

        public function __construct()
        {
            $this->userModel= $this->loadModel("User");
        }

        public function register(){
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "name" => trim($_POST['name']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "confirm_password" =>trim($_POST['confirm_password']),
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirm_password_error" => ""
            ];

            if (empty($data['name'])) {
                $data['name_error'] = "Please enter a name";
            }

            if (empty($data['email'])) {
                $data['email_error'] = "Please enter email";
            } 
            
            if (empty($data['password'])) {
                $data['password_error'] = "Please enter password";
            }
            
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = "Please confirm password";
            }

            if ($this->userModel->findUserByEmail($data['email'])){
                $data['email_error'] = "email already registered";
            }

            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])){
                if ($_POST['confirm']){
                    $subdata = [
                        "name" => trim($_POST['name']),
                        "email" => trim($_POST['email']),
                        "password" => trim($_POST['password'])
                    ];
                    $this->userModel->register($subdata);
                }
            }
        }
    }
    }
?>