<?php
session_start();

require_once __DIR__ . '/app/controllers/TareaController.php';
$tareaController = new TareaController();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        require_once __DIR__ . '/app/controllers/AuthController.php';
        $auth = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->login();
        } else {
            $auth->mostrarLogin();
        }
        break;

    case 'logout':
        require_once __DIR__ . '/app/controllers/AuthController.php';
        $auth = new AuthController();
        $auth->logout();
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

    default:
        $tareaController->index();
        break;
}