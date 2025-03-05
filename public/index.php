<?php
require_once '../config/config.php';
require_once '../app/controllers/AuthController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$authController = new AuthController();

switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        $authController->login();
        break;
}