<?php
// Iniciar sesión y conexión a la base de datos
session_start();
require_once 'database.php'; // Ajusta la ruta si es necesario
require_once 'Perfil.php';  // Modelo para el perfil

// Verificar si el parámetro 'id' está presente
if (isset($_GET['id'])) {
    $idPerfil = $_GET['id'];

    // Crear el modelo de perfil
    $perfilModel = new Perfil($pdo);

    // Obtener los detalles del perfil
    $perfil = $perfilModel->getById($idPerfil);

    if ($perfil) {
        // Mostrar los detalles del perfil
        echo "<h1>Detalles del Perfil</h1>";
        echo "<p><strong>ID:</strong> " . $perfil['Id_perfil'] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $perfil['Nombre_perfil'] . "</p>";
        // Agrega más detalles si es necesario
    } else {
        echo "<p>Perfil no encontrado.</p>";
    }
} else {
    echo "<p>ID de perfil no especificado.</p>";
}
?>
