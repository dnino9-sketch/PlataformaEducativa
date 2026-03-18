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
        return [
            new Tarea(1, "Matemática", "4° Grado A", "Curso A", "Ejercicios de álgebra", "Pendiente"),
            new Tarea(2, "Ciencias", "4° Grado A", "Curso A", "Proyecto de biología", "Entregada"),
            new Tarea(3, "Español", "4° Grado A", "Curso A", "Resumen de lectura", "En revisión"),
        ];
    }
}