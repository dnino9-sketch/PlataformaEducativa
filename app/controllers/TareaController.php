<?php
require_once __DIR__ . '/../models/Tarea.php';

class TareaController {
    public function index() {
        $tareas = Tarea::obtenerTareas();

        $pageTitle = "Mis Tareas";
        $activePage = "tareas";

        require_once __DIR__ . '/../views/tareas.php';
    }
}