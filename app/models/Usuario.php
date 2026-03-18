<?php
class Usuario {
    public $id;
    public $nombre;
    public $email;
    private $passwordHash;  // contraseña cifrada
    public $rol; // Ejemplo: alumno, docente, padre, admin
    
    public function __construct($id, $nombre, $email, $passwordHash, $rol) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->rol = $rol;
    }

    // Simulación de base de datos de usuarios
    public static function obtenerUsuarios() {
        return [
            new Usuario(1, "Carlos Pérez", "carlos@example.com", password_hash("123456", PASSWORD_BCRYPT), "alumno"),
            new Usuario(2, "María Gómez", "maria@example.com", password_hash("abcdef", PASSWORD_BCRYPT), "docente"),
        ];
    }
    
    // Validar usuario por email y contraseña (simulado)
    public static function validarUsuario($email, $password) {
        $usuarios = self::obtenerUsuarios();
        foreach ($usuarios as $usuario) {
            if ($usuario->email === $email && password_verify($password, $usuario->passwordHash)) {
                return $usuario;
            }
        }
        return null;
    }
}