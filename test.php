<?php
require_once __DIR__ . '/app/core/Database.php';

if (class_exists('Database')) {
    echo "Database cargada correctamente.";
} else {
    echo "Error: Database no encontrada.";
}