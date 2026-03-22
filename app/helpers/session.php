<?php
function verificarSesionActiva() {
    
    if (!isset($_SESSION['usuario'])) {
        header('Location: /PlataformaEducativa/index.php?action=login');
        exit();
    }
}