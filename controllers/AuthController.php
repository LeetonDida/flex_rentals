<?php
require_once '../models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if ($this->user->register($data)) {
                header('Location: login.php');
            } else {
                echo "Registration failed!";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->user->login($email, $password)) {
                header('Location: ../dashboard/index.php');
            } else {
                echo "Login failed!";
            }
        }
    }

    public function logout() {
        $this->user->logout();
        header('Location: login.php');
    }
}