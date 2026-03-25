<?php
session_start();

// Requires de controladores al inicio para evitar "class not found"
require_once __DIR__ . '/app/controllers/TareaController.php';
require_once __DIR__ . '/app/controllers/AuthController.php';

// Instancias anticipadas para reutilizar en el switch
$tareaController = new TareaController();
$authController = new AuthController();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->mostrarLogin();
        }
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'crear_tarea':
        $tareaController->crear();
        break;

    case 'guardar_tarea':
        $tareaController->guardar();
        break;

    case 'ver_tarea':
        $tareaController->ver();
        break;

    case 'editar_tarea':
        $tareaController->editar();
        break;

    case 'actualizar_tarea':
        $tareaController->actualizar();
        break;

    case 'registro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->registrar();
        } else {
            $authController->mostrarRegistro();
        }
        break;

    default:
        $tareaController->index();
        break;
}