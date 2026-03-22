<?php
// app/models/Tarea.php
class Tarea {
    public $id;
    public $materia;
    public $grado;
    public $curso;
    public $descripcion;
    public $estado;  // Pendiente, Entregada, En revisión
    
    public function __construct($id, $materia, $grado, $curso, $descripcion, $estado) {
        $this->id = $id;
        $this->materia = $materia;
        $this->grado = $grado;
        $this->curso = $curso;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }
    
    // Método para traer todas las tareas (simulación)
    public static function obtenerTareas() {
        // Si hay tareas guardadas en sesión las usamos
        // para que las tareas creadas nuevas también aparezcan
        if (isset($_SESSION['tareas']) && !empty($_SESSION['tareas'])) {
            return $_SESSION['tareas'];
        }
        // Si no hay sesión, retornamos tareas simuladas por defecto
        return [
            new Tarea(1, "Matemática", "4° Grado A", "Curso A", "Ejercicios de álgebra", "Pendiente"),
            new Tarea(2, "Ciencias", "4° Grado A", "Curso A", "Proyecto de biología", "Entregada"),
            new Tarea(3, "Español", "4° Grado A", "Curso A", "Resumen de lectura", "En revisión"),
        ];
    }

    // Método para obtener una tarea específica por su ID
    public static function obtenerTareaPorId($id) {
        // Obtenemos todas las tareas (de sesión o simuladas)
        $tareas = self::obtenerTareas();
        // Buscamos la tarea que coincida con el ID
        foreach ($tareas as $tarea) {
            if ($tarea->id == $id) {
                return $tarea;
            }
        }
        // Si no se encuentra retornamos null
        return null;
    }
}