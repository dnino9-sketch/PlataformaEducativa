<?php
require_once __DIR__ . '/../core/Database.php';

class Tarea {
    public $id;
    public $materia;
    public $grado;
    public $curso;
    public $descripcion;
    public $estado;

    public function __construct($id, $materia, $grado, $curso, $descripcion, $estado) {
        $this->id = $id;
        $this->materia = $materia;
        $this->grado = $grado;
        $this->curso = $curso;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    // Obtener todas las tareas desde la base de datos
    public static function obtenerTareas() {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->query("SELECT * FROM tareas ORDER BY id DESC");
        $tareas = [];
        while ($row = $stmt->fetch()) {
            $tareas[] = new Tarea($row->id, $row->materia, $row->grado, $row->curso, $row->descripcion, $row->estado);
        }
        return $tareas;
    }

    // Obtener tarea específica por ID desde base de datos
    public static function obtenerTareaPorId($id) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM tareas WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Tarea($row->id, $row->materia, $row->grado, $row->curso, $row->descripcion, $row->estado);
        }
        return null;
    }

    // Crear nueva tarea en base de datos
    public static function crear($materia, $grado, $curso, $descripcion, $estado) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO tareas (materia, grado, curso, descripcion, estado) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$materia, $grado, $curso, $descripcion, $estado]);
    }

    // Actualizar tarea existente en base de datos
    public static function actualizar($id, $materia, $grado, $curso, $descripcion, $estado) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("UPDATE tareas SET materia = ?, grado = ?, curso = ?, descripcion = ?, estado = ? WHERE id = ?");
        return $stmt->execute([$materia, $grado, $curso, $descripcion, $estado, $id]);
    }
}