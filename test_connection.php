<?php
require_once __DIR__ . '/app/core/Database.php';

try {
    $pdo = Database::getInstance()->getConnection();
    echo "Conexión exitosa a MySQL!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}