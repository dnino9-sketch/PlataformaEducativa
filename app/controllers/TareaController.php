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

    // Guardar tarea enviada por formulario (en simulación)
    public function guardar() {
        verificarSesionActiva();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger datos del formulario
            $materia = $_POST['materia'] ?? '';
            $grado = $_POST['grado'] ?? '';
            $curso = $_POST['curso'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $estado = $_POST['estado'] ?? 'Pendiente';

            // Guardar las tareas en la sesión para simular persistencia
            if (!isset($_SESSION['tareas'])) {
                $_SESSION['tareas'] = Tarea::obtenerTareas();
            }
            // Crear nueva tarea con ID automático
            $nuevaId = count($_SESSION['tareas']) + 1;
            $nuevaTarea = new Tarea($nuevaId, $materia, $grado, $curso, $descripcion, $estado);
            $_SESSION['tareas'][] = $nuevaTarea;

            // Redirigir a la lista de tareas
            header("Location: /PlataformaEducativa/");
            exit();
        } else {
            // Si no es POST redirigir al formulario
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

// Actualizar la tarea con datos del formulario
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

        // Actualizar tarea en la sesión
        if (isset($_SESSION['tareas'])) {
            foreach ($_SESSION['tareas'] as &$tarea) {
                if ($tarea->id == $id) {
                    $tarea->materia = $materia;
                    $tarea->grado = $grado;
                    $tarea->curso = $curso;
                    $tarea->descripcion = $descripcion;
                    $tarea->estado = $estado;
                    break;
                }
            }
            unset($tarea); // rompiendo referencia
        }

        // Redirigir a la lista de tareas
        header("Location: /PlataformaEducativa/");
        exit();
    } else {
        // Si no es POST redirigir a página principal
        header("Location: /PlataformaEducativa/");
        exit();
    }
}
}