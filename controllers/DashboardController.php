<?php
require_once '../models/User.php';

class DashboardController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        if (!$this->user->isLoggedIn()) {
            header('Location: ../auth/login.php');
        }
    }
}