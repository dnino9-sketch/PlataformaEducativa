<?php
require_once __DIR__ . '/app/core/Database.php';

echo "Testing read from table... <br>";

$email = 'test@example.com';  // Correct email without space

$pdo = Database::getInstance()->getConnection();
$stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
$stmt->execute([$email]);
$row = $stmt->fetch();

if ($row) {
    var_dump($row);  // Shows the user row if found
    echo "User found!";
} else {
    echo "No user found with email: $email";
}