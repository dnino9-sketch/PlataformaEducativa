<?php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {

    // Mostrar formulario de login
    public function mostrarLogin($error = null) {
        $pageTitle = "Iniciar Sesión";
        require_once __DIR__ . '/../views/login.php';
    }

    // Procesar login (corregido typo)
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = Usuario::validarUsuario($email, $password);
            if ($usuario) {
                $_SESSION['usuario'] = [
                    'id' => $usuario->id, 
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'rol' => $usuario->rol
                ];
                header("Location: /PlataformaEducativa/");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos.";
                $this->mostrarLogin($error);
            }
        } else {
            $this->mostrarLogin();
        }
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        header("Location: /PlataformaEducativa/index.php?action=login");
        exit();
    }

    // Mostrar formulario de registro
    public function mostrarRegistro($error = null) {
        $pageTitle = "Registro de Usuario";
        require_once __DIR__ . '/../views/registro.php';
    }

    // Procesar registro (corregido, with empty check and depurator)
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $rol = $_POST['rol'] ?? 'alumno';

            // Check empty
            if (empty($nombre) || empty($email) || empty($password)) {
                $error = "Todos los campos son obligatorios.";
                $this->mostrarRegistro($error);
                return;
            }

            if (Usuario::emailExiste($email)) {
                $error = "El correo ya está registrado.";
                $this->mostrarRegistro($error);
                return;
            }

            $resultado = Usuario::registrar($nombre, $email, $password, $rol);

            // Depurator: Show result
            var_dump($resultado); die();  // Temporary, delete after test

            if ($resultado) {
                header("Location: /PlataformaEducativa/index.php?action=login");
                exit();
            } else {
                $error = "Error al registrar usuario. Intenta de nuevo.";
                $this->mostrarRegistro($error);
            }
        } else {
            $this->mostrarRegistro();
        }
    }
}