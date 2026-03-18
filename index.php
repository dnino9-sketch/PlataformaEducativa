<?php
session_start();

$action = $_GET['action'] ?? '';

if ($action === 'login') {
    require_once __DIR__ . '/app/controllers/AuthController.php';
    $auth = new AuthController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $auth->login();
    } else {
        $auth->mostrarLogin();
    }
} elseif ($action === 'logout') {
    require_once __DIR__ . '/app/controllers/AuthController.php';
    $auth = new AuthController();
    $auth->logout();
} else {
    require_once __DIR__ . '/app/controllers/TareaController.php';
    $controller = new TareaController();
    $controller->index();
}