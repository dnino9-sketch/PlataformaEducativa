<?php
require_once __DIR__ . '/app/core/Database.php';

echo "Testing read from table... <br>";

$email = 'test@example.com';  // Change to the exact email from phpMyAdmin if different

$pdo = Database::getInstance()->getConnection();

 // Debug 1: Count total rows in table
 $stmt = $pdo->query("SELECT COUNT(*) FROM usuario");
 echo "Total rows in table: " . $stmt->fetchColumn() . "<br>";

 // Debug 2: Try to find the user
 $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
 $stmt->execute([$email]);
 $row = $stmt->fetch();

 if ($row) {
    var_dump($row);  // Shows the user row
    echo "User found!";
 } else {
    echo "No user found with email: $email";
 }