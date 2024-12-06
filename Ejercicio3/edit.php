<?php
session_start();
require_once 'database.php';
require_once 'Perfil.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $idPerfil = $_GET['id'];
    $nombrePerfil = $_POST['nombre'];

    // Crear el modelo de perfil
    $perfilModel = new Perfil($pdo);

    // Actualizar el perfil
    $perfilModel->update($idPerfil, $nombrePerfil);

    // Redirigir a la lista de perfiles
    header("Location: perfil_list.php");
    exit();
}

// Si la página no es enviada por POST, mostrar error
echo "<p>Error al intentar actualizar el perfil.</p>";
?>
