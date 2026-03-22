<?php
require_once __DIR__ . '/../models/Tarea.php';
require_once __DIR__ . '/../helpers/session.php';

class TareaController {
    
    // Mostrar listado de tareas
    public function index() {
        verificarSesionActiva();

        $tareas = Tarea::obtenerTareas();

        $pageTitle = "Mis Tareas";
        $activePage = "tareas";

        require_once __DIR__ . '/../views/tareas.php';
    }

    // Mostrar formulario para crear tarea
    public function crear() {
        verificarSesionActiva();

        $pageTitle = "Crear Nueva Tarea";
        require_once __DIR__ . '/../views/crear_tarea.php';
    }

    // Guardar tarea enviada por formulario usando base de datos
    public function guardar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $materia = $_POST['materia'] ?? '';
            $grado = $_POST['grado'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            // Guardar tarea en base de datos
            $resultado = Tarea::crear($materia, $grado, $curso, $descripcion, $estado);

            // Puedes manejar el resultado para mostrar mensaje u otros (opcional)

            // Redirigir a la lista de tareas
            header("Location: /PlataformaEducativa/");
            exit();
        } else {
            header("Location: /PlataformaEducativa/index.php?action=crear_tarea");
            exit();
        }
    }

    // Ver detalle de una tarea específica
    public function ver() {
        verificarSesionActiva();

        $id = $_GET['id'] ?? null;

        if ($id === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);

        if ($tarea === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $pageTitle = "Ver Tarea - " . $tarea->materia;
        require_once __DIR__ . '/../views/ver_tarea.php';
    }

    // Mostrar formulario para editar tarea
    public function editar() {
        verificarSesionActiva();

        $id = $_GET['id'] ?? null;
        if ($id === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $tarea = Tarea::obtenerTareaPorId($id);
        if ($tarea === null) {
            header("Location: /PlataformaEducativa/");
            exit();
        }

        $pageTitle = "Editar Tarea";
        require_once __DIR__ . '/../views/editar_tarea.php';
    }

    // Actualizar la tarea con datos del formulario usando base de datos
    public function actualizar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $materia = $_POST['materia'] ?? '';
            $grado = $_POST['grado'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            if ($id === null) {
                header("Location: /PlataformaEducativa/");
                exit();
            }

            // Actualizar tarea en la base de datos
            $resultado = Tarea::actualizar($id, $materia, $grado, $curso, $descripcion, $estado);

            // Puedes manejar el resultado para mostrar mensaje u otros (opcional)

            // Redirigir a la lista de tareas
            header("Location: /PlataformaEducativa/");
            exit();
        } else {
            header("Location: /PlataformaEducativa/");
            exit();
        }
    }
}