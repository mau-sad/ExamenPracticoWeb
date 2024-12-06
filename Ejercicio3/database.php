<?php
$host = 'localhost';
$dbname = 'ExamenPracticoWeb';
$username = 'root';  // Cambiar por el usuario de tu base de datos
$password = '';      // Cambiar por la contraseña de tu base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
