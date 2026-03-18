<?php

require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    // Mostrar formulario de login
    public function mostrarLogin($error = null) {
        $pageTitle = "Iniciar Sesión";
        require_once __DIR__ . '/../views/login.php';
    }

    // Procesar login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validar usuario
            $usuario = Usuario::validarUsuario($email, $password);
            if ($usuario) {
                // Guardar datos en sesión
                $_SESSION['usuario'] = [
                    'id' => $usuario->id,
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'rol' => $usuario->rol
                ];
                // Redirigir a página principal o tareas
                header("Location: /PlataformaEducativa/");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos";
                $this->mostrarLogin($error);
            }
        } else {
            $this->mostrarLogin();
        }
    }

    // Cerrar sesión
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /PlataformaEducativa/login");
        exit();
    }
}