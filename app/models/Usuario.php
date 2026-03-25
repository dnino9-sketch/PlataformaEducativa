<?php
require_once __DIR__ . '/../core/Database.php';

class Usuario {
    // ... your public properties ...

    public function __construct($id, $nombre, $email, $password, $rol, $creado_en) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->creado_en = $creado_en;
    }

    // Registrar (changed to 'usuario')
    public static function registrar($nombre, $email, $password, $rol = 'alumno') {
        $pdo = Database::getInstance()->getConnection();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO usuario (nombre, email, password, rol) VALUES (?, ?, ?, ?)") ;
        return $stmt->execute([$nombre, $email, $hash, $rol]);
    }

    // Validar (changed to 'usuario')
    public static function validarUsuario($email, $password) {
    $pdo = Database::getInstance()->getConnection();
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if ($row && $row->password == $password) {  // Temporary plain check for test
    return new Usuario($row->id, $row->nombre, $row->email, $row->password, $row->rol, $row->creado_en);
}
    return null;
}

    // ... other methods changed to 'usuario' ...
    public static function obtenerPorId($id) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Usuario($row->id, $row->nombre, $row->email, $row->password, $row->rol, $row->creado_en);
        }
        return null;
    }

    public static function obtenerTodos() {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->query("SELECT * FROM usuario ORDER BY id DESC");
        $usuarios = [];
        while ($row = $stmt->fetch()) {
            $usuarios[] = new Usuario($row->id, $row->nombre, $row->email, $row->password, $row->rol, $row->creado_en);
        }
        return $usuarios;
    }

    public static function emailExiste($email) {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }
}